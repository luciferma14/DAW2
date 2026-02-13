<?php
class Personajes {

    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query("SELECT * FROM characters");
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM characters WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($data) {
        $stmt = $this->pdo->prepare(
            "INSERT INTO characters (name, gender, height) VALUES (?, ?, ?)"
        );
        $stmt->execute([
            $data["name"],
            $data["gender"] ?? null,
            $data["height"] ?? null
        ]);

        return $this->getById($this->pdo->lastInsertId());
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare(
            "UPDATE characters SET name=?, gender=?, height=? WHERE id=?"
        );

        return $stmt->execute([
            $data["name"],
            $data["gender"] ?? null,
            $data["height"] ?? null,
            $id
        ]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare("DELETE FROM characters WHERE id=?");
        return $stmt->execute([$id]);
    }

    public function importarSWAPI() {

        $url = "https://swapi.dev/api/people/";
        $personajes = [];

        do {
            $json = file_get_contents($url);
            $data = json_decode($json, true);

            foreach ($data["results"] as $p) {
                $stmt = $this->pdo->prepare(
                    "INSERT INTO characters (name, gender, height) VALUES (?, ?, ?)"
                );
                $stmt->execute([
                    $p["name"],
                    $p["gender"],
                    is_numeric($p["height"]) ? $p["height"] : null
                ]);
                $personajes[] = $p["name"];
            }

            $url = $data["next"];

        } while ($url);

        return $personajes;
    }
}

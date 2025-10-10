# Información sobre mí

[Echa un vistazo a mi perfil de GitHub.](https://github.com/luciferma14)

## Quién soy

Hola, soy Lucía Ferrandis, estudiante de Desarrollo de Aplicaciones Web.
Me considero una persona curiosa, constante y con muchas ganas de seguir aprendiendo. Me gusta entender cómo funcionan las cosas por dentro, especialmente cuando se trata de interfaces.

## Qué me gusta

Disfruto del diseño web minimalista, de crear interfaces limpias y funcionales, pero también me gusta la parte lógica y técnica del desarrollo, como programar en Java, PHP o JavaScript, y montar entornos con Docker y AWS.
Fuera del código, me gusta la música, los videojuegos. En mis ratos libres, aprovecho para prácticar con la guitarra y los videojuegos.

## Highlights

### Problema a resolver  
El programa lee un archivo `CSV`, guarda los datos en objetos `Municipio` y muestra los tres con mayor valor, ordenados de forma descendente.

### Código destacado  

#### Ejer5.java
```java
import java.io.BufferedReader;
import java.io.FileReader;
import java.util.ArrayList;
import java.util.Collections;

public class Ejer5 {
    public static void main(String[] args) {
        if (args.length < 1) {
            System.out.println("Falta el archivo .csv como argumento");
            return;
        }

        String fichero = args[0];
        int num = 3; // valor por defecto
        ArrayList<Municipio> lista = new ArrayList<>();

        try (BufferedReader br = new BufferedReader(new FileReader(fichero))) {
            String linea = br.readLine(); // saltar cabecera
            while ((linea = br.readLine()) != null) {
                String[] partes = linea.split(";");
                if (partes.length > 4) {
                    String codigo = partes[2].trim();
                    String territorio = partes[3].trim();
                    String valorStr = partes[4].trim();

                    if (valorStr.equals("-") || valorStr.isEmpty()) continue;

                    try {
                        int valor = Integer.parseInt(valorStr);
                        lista.add(new Municipio(codigo, territorio, valor));
                    } catch (NumberFormatException e) {
                        System.out.println(e.getMessage());
                    }
                }
            }
        } catch (Exception e) {
            System.out.println("Error leyendo el archivo: " + e.getMessage());
            return;
        }

        Collections.sort(lista);

        for (int i = 0; i < Math.min(num, lista.size()); i++) {
            Municipio m = lista.get(i);
            System.out.println("Territorio: " + m.getTerritorio());
            System.out.println("Valor: " + m.getValor());
            System.out.println("Código: " + m.getCodigo());
            System.out.println("----------------");
        }
    }
}
```
## Tecnologías utilizadas

Durante los dos cursos de DAW, he estado utilizando estas tecnologías, entre otras:

* Docker
* Apache2
* PHP
* MySQL
* AWS ECS

## Reflexión

He destacado esto de mí, por que considero que es lo que más me representa. La curiosidad sobre el desarrollo, la música, los videojuegos, el minimalismo. En resumen, lo sencillo. Por eso, pienso que soy una persona sencilla y con la mayoría de las cosas claras.
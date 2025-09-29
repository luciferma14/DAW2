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

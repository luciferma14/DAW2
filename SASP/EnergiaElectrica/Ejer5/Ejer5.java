import java.io.BufferedReader;
import java.io.FileReader;
import java.util.Scanner;

public class Ejer5{
    public static void main(String[] args) {
        
        Scanner sc = new Scanner(System.in);

        if (args.length <= 0){
            System.out.println("No hay argumentos");
        }else{

            String fichero = args[0];
            String codigo; 
            String territorio;
            String valor;

            try {
                
                FileReader fr = new FileReader(fichero);
                 BufferedReader br = new BufferedReader(fr);

                while ((fichero = br.readLine()) != null){
                    codigo = fichero.split(";")[2];
                    territorio = fichero.split(";")[3];
                    valor = fichero.split(";")[4];


                    System.out.println("Codigo: " + codigo);
                    System.out.println("Territorio: " + territorio);
                    System.out.println("Valor: " + valor);
                }

                fr.close();
                br.close();

            } catch (Exception e) {
                System.out.println(e.getMessage());
            }
        }
    }
}
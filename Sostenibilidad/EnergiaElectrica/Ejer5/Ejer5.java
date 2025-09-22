import java.io.BufferedReader;
import java.io.FileReader;
import java.util.ArrayList;
import java.util.Scanner;

public class Ejer5{    

    class Municipio{
    
        private String codigo; 
        private String territorio;
        private String valor;

        public Municipio(String territorio, String valor, String codigo){
            this.territorio = territorio;
            this.valor = valor;
            this.codigo = codigo;
        } 
    }

    public static void main(String[] args) {
        
        Scanner sc = new Scanner(System.in);

        if (args.length <= 0){
            System.out.println("No hay argumentos");
        }else{

            String fichero = args[0];
            String codigo; 
            String territorio;
            String valor;
            ArrayList <Municipio> lista = new ArrayList<>();

            try {
                
                FileReader fr = new FileReader(fichero);
                BufferedReader br = new BufferedReader(fr);
                String linea1 = br.readLine();

                while ((fichero = br.readLine()) != null){
                    codigo = fichero.split(";")[2];
                    territorio = fichero.split(";")[3];
                    valor = fichero.split(";")[4];

                    try{
                        lista.add(new Municipio(territorio, valor, codigo));

                    }catch(Exception e){}


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
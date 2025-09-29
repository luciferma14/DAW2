public class Municipio implements Comparable<Municipio> {
    private String codigo;
    private String territorio;
    private Integer valor;

    public Municipio(String codigo, String territorio, Integer valor) {
        this.codigo = codigo;
        this.territorio = territorio;
        this.valor = valor;
    }

    public String getCodigo() {
        return codigo;
    }

    public String getTerritorio() {
        return territorio;
    }

    public Integer getValor() {
        return valor;
    }

    @Override
    public int compareTo(Municipio otro) {
        return Integer.compare(otro.valor, this.valor); // descendente
    }
}

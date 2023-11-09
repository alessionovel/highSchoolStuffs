package bean;

public class Giocatore {
	private String nome;
	private int numIscr, risLanci[]=new int[3];

	public Giocatore(){
		nome = "Mario";
		numIscr = 0;
	}

	public String getNome() {
		return nome;
	}

	public int getNumIscr() {
		return numIscr;
	}

	public int[] getRisLanci() {
		return risLanci;
	}

	public Giocatore(String nome, int numIscr){
		this.nome = nome;
		this.numIscr = numIscr;
	}
}
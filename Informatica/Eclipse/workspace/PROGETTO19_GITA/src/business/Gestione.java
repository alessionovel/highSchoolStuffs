package business;

import java.util.ArrayList;
import java.util.Collections;
import java.util.List;

import bean.Cliente;


public class Gestione {
	List <Cliente> part = new ArrayList<Cliente>();
	List <Cliente> attesa = new ArrayList<Cliente>();
	int nMax=0;

	public void setnMax(int nMax) {
		int sposta=this.nMax-nMax;
		this.nMax = nMax;
		for (int i=0;i<sposta;i++) {
			if (attesa.get(0)!=null) {
				aggC(attesa.get(0).getNome(),attesa.get(0).getCognome(),attesa.get(0).getTelefono(),attesa.get(0).getTelefono(),attesa.get(0).getEta());
				attesa.remove(0);
			}
		}
	}

	public int getnMax() {
		return nMax;
	}

	public String aggC(String nome, String cognome, String telefono, String indirizzo, String eta) {
		String ret="";
		if (part.size()<nMax) {
			part.add(new Cliente(nome,cognome,telefono,indirizzo,eta));
			ret=nome + " " + cognome + " aggiunto alla lista partecipanti";
		}else {
			attesa.add(new Cliente(nome,cognome,telefono,indirizzo,eta));
			ret=nome + " " + cognome + " aggiunto alla lista di attesa";
		}
		return ret;
	}

	public String delC(String nome, String cognome, String telefono) {
		String ret="";
		boolean trovato=false;
		int i=0;
		do {
			trovato=part.get(i).confronto(nome, cognome, telefono);
			i++;
		}while (trovato==false && i<part.size());
		if (trovato==true) {
			i--;
			part.remove(i);
			ret="Cliente rimosso";
			if(attesa.size()==0) {
			}else{
				part.add(attesa.get(0));
				ret=ret + " ed è stato sostituito con " + attesa.get(0).getNome() + " " + attesa.get(0).getCognome();
				attesa.remove(0);
			}
		}else{
			ret="Cliente non trovato";
		}
		return ret;
	}

	public int verPart() {
		return part.size();
	}

	public int verAtt() {
		return attesa.size();
	}

	public String mostraPart(){
		String ret="\nPartecipanti:\n";
		Collections.sort(part);
		for(Cliente c:part){
			ret=ret+c.toString();
		}
		return ret;
	}

	public String mostraAtt(){
		String ret="\nLista attesa:\n";
		for(Cliente c:attesa){
			ret=ret+c.toString()+ "\n";
		}
		return ret;
	}

	public String salvaPart(int i) {
		String ret=addSpaz(part.get(i).getNome(),20)+addSpaz(part.get(i).getCognome(),20)+addSpaz(part.get(i).getTelefono(),16)+addSpaz(part.get(i).getIndirizzo(),30)+addSpaz(part.get(i).getEta(),2);
		return ret;
	}

	public int getPartSize() {
		return part.size();
	}
	
	public String getnMax2() {
		return addSpaz(String.valueOf(nMax).toString(),3);
	}

	public String addSpaz(String stringa, int lung) {
		int spazi=lung-stringa.length();
		for (int i=0;i<spazi;i++) {
			stringa=stringa+" ";
		}
		return stringa;
	}
}

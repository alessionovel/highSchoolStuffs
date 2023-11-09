package business;

import java.util.Random;

public class Main {

	int ic=0;
	int coda[] = new int[50];

	public static void main(String[] args) {
		new Main();
	}

	public Main(){
		int proxArrivo=1, durata=1, numSecInattivitaCPU=0, nArrivo=0, pos=0, maxCoda=0, codaAtt;
		double tempoMedioAttesa=0;
		Random casuale = new Random();
		for (int i=0;i<50;i++){
			coda[i]=0;
		}
		do{
			System.out.println(pos);
			if (durata>0){
				durata--;
			}
			if (durata==0){
				if(coda[0]!=0){
					durata=coda[0];
					slittacoda();
				}else{
					numSecInattivitaCPU++;
				}
			}
			proxArrivo--;
			if (proxArrivo==0){
				if (ic<50){
					coda[ic] = casuale.nextInt(4)+1;
					ic++;
				}
				proxArrivo = casuale.nextInt(3)+1;
				tempoMedioAttesa = tempoMedioAttesa + proxArrivo;
				nArrivo++;
				codaAtt=0;
				for(int i=0;i<ic-1;i++){
					codaAtt=codaAtt+coda[i];
				}
				if (codaAtt>maxCoda) maxCoda=codaAtt;
			}
			pos++;
		}while(pos<1000);
		tempoMedioAttesa=tempoMedioAttesa/nArrivo;
		numSecInattivitaCPU=1000-numSecInattivitaCPU;
		System.out.println("\nNumero secondi inattività CPU= " + numSecInattivitaCPU + "\nTempo medio attesa= " + tempoMedioAttesa + "\nLunghezza massima coda= " + maxCoda);
	}

	public void slittacoda(){
		for(int i=0;i<(ic-1);i++){
			coda[i]=coda[i+1];
			coda[i+1]=0;
		}
	}

}

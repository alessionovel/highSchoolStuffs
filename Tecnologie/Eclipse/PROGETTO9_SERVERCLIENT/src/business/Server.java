package business;

	import java.io.DataInputStream;
	import java.io.DataOutputStream;
	import java.net.ServerSocket;
	import java.net.Socket;
	import java.util.Scanner;
	
	public class Server {
	public static void main(String args[])throws Exception{
	
	ServerSocket ss= new ServerSocket(3333);
	System.out.println("Attendi l'altro utente");
	Socket s = ss.accept();
	DataInputStream din= new DataInputStream(s.getInputStream());
	DataOutputStream dout = new DataOutputStream(s.getOutputStream());
	Scanner sc=new Scanner(System.in);
	String str="",str2="";
	
	
	String nome = din.readUTF();
	System.out.println("Chat avviata con " + nome + "\nInserisci il tuo nome");
	
	str2=sc.nextLine();
	dout.writeUTF(str2);
	dout.flush();
	
	while(!str.equals("stop")){
	str=din.readUTF();
	System.out.println(nome + ": "+str);
	str2=sc.nextLine();
	dout.writeUTF(str2);
	dout.flush();
	}
	
	din.close();
	s.close();
	ss.close();
	sc.close();
	
	}
	
	
	}

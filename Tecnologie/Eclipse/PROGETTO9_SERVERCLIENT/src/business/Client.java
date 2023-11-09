package business;

import java.io.DataInputStream;
import java.io.DataOutputStream;
import java.net.Socket;
import java.util.Scanner;

public class Client {
	public static void main(String args[])throws Exception{
		Socket s= new Socket("192.168.107.84",2914);
		DataInputStream din= new DataInputStream(s.getInputStream());
		DataOutputStream dout = new DataOutputStream(s.getOutputStream());
		Scanner sc=new Scanner(System.in);
		String str="",str2="";

		while(!str.equals("stop")){
			str=sc.nextLine();
			if(str.equals("1")) {
				str2=din.readUTF();
			}else {
				dout.writeUTF(str);
				dout.flush();
				str2=din.readUTF();
			}
			System.out.println(str2);
		}



		dout.close();
		s.close();
		sc.close();

	}


}

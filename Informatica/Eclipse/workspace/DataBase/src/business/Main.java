package business;

import java.sql.*;

public class Main {

	Dao dao = new Dao();

	public static void main(String[] args) throws SQLException {
		new Main();

	}

	Main() throws SQLException {
		System.out.println(dao.leggi());
		int numero = 2;
		double doublee = 2;
		char lettera = '2';
		String stringa = "2";
		dao.insert(numero, doublee, lettera, stringa);
	}
}

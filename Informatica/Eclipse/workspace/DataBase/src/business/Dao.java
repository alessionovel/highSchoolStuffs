package business;

import java.sql.*;

public class Dao {
	Connection dbconn;
	Statement st;
	String sql;

	public Dao() {
		sql = "";
		try {
			Class.forName("com.mysql.jdbc.Driver");
		} catch (ClassNotFoundException e) {
			e.printStackTrace();
			System.out.println("Collegamento Database non riuscito");
		}
		try {
			dbconn = DriverManager.getConnection("jdbc:mysql://localhost:3306/nomedt?user=root&password=");
		} catch (SQLException e) {
			e.printStackTrace();
			System.out.println("Database non trovato");
		}
		try {
			st = dbconn.createStatement();
		} catch (SQLException e) {
			e.printStackTrace();
			System.out.println("Errore");
		}
	}

	public String insert(int numero, double doublee, char lettera, String stringa) {
		String ret = "";
		sql = "INSERT INTO tabella VALUES (" + numero + "," + doublee + ",'" + lettera + "','" + stringa + "')";
		try {
			st.executeUpdate(sql);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		return ret;
	}

	public String leggi() throws SQLException {
		String ret = "";
		sql = "SELECT * FROM tabella";
		ResultSet res = null;
		try {
			res = st.executeQuery(sql);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		int numero;
		double doublee;
		String lettera;
		String stringa;
		while (res.next()) {
			numero = res.getInt("intero");
			doublee = res.getDouble("doublee");
			lettera = res.getString("char");
			stringa = res.getString("stringa");
			ret = ret + numero + " " + doublee + " " + lettera + " " + stringa + "\n";
		}
		return ret;
	}
}

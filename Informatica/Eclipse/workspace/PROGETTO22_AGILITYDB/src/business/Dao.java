package business;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import bean.Cane;
import bean.CaneGrande;
import bean.CaneMedio;
import bean.CanePiccolo;

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
			dbconn = DriverManager.getConnection("jdbc:mysql://localhost:3306/garaagility?user=root&password=");
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

	public String insert(Cane c) {
		String ret = "";
		sql = "INSERT INTO cani VALUES (" + c.getNum() + ",'" + c.getNomeCane() + "','" + c.getTaglia() + "','"
				+ c.getNomePadrone() + "'," + c.getAnni() + "," + 0 + "," + 0 + "," + 0 + ",'" + c.getRazza() + "',"
				+ c.getPeso() + ")";
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

	public String elencoNome() throws SQLException {
		String ret = "\n";
		sql = "SELECT * FROM cani ORDER BY nomeCane";
		ResultSet res = null;
		try {
			res = st.executeQuery(sql);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		String nomeCane, nomePadrone, razza, taglia;
		int anni, num;
		double peso;
		while (res.next()) {
			nomeCane = res.getString("nomeCane");
			nomePadrone = res.getString("nomePadrone");
			razza = res.getString("razza");
			taglia = res.getString("taglia");
			anni = res.getInt("annoNascCane");
			peso = res.getDouble("peso");
			num = res.getInt("progrGara");
			ret = ret + num + ". Nome: " + nomeCane + " Nome Padrone: " + nomePadrone + " Razza: " + razza + " Taglia: "
					+ taglia + " Anni: " + anni + " Peso: " + peso + "\n";
		}
		return ret;
	}

	public String elencoNum() throws SQLException {
		String ret = "\n";
		sql = "SELECT * FROM cani ORDER BY progrGara";
		ResultSet res = null;
		try {
			res = st.executeQuery(sql);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		String nomeCane, nomePadrone, razza, taglia;
		int anni, num;
		double peso;
		while (res.next()) {
			nomeCane = res.getString("nomeCane");
			nomePadrone = res.getString("nomePadrone");
			razza = res.getString("razza");
			taglia = res.getString("taglia");
			anni = res.getInt("annoNascCane");
			peso = res.getDouble("peso");
			num = res.getInt("progrGara");
			ret = ret + num + ". Nome: " + nomeCane + " Nome Padrone: " + nomePadrone + " Razza: " + razza + " Taglia: "
					+ taglia + " Anni: " + anni + " Peso: " + peso + "\n";
		}
		return ret;
	}

	public int getProgr() {
		sql = "SELECT progrGara FROM cani";
		ResultSet res = null;
		try {
			res = st.executeQuery(sql);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		int num = 0;
		try {
			while (res.next()) {
				num = res.getInt("progrGara");
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return num;
	}

	public Cane chiamaCane() {
		sql = "SELECT * FROM cani WHERE tempo=0";
		ResultSet res = null;
		boolean controllo = false;
		Cane cane = null;
		try {
			res = st.executeQuery(sql);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		try {
			res.next();
		} catch (SQLException e) {
			controllo = true;
		}
		if (controllo == false) {
			String nomeCane = null, nomePadrone = null, razza = null, taglia = null;
			int anni = 0, num = 0;
			double peso = 0;
			try {
				nomeCane = res.getString("nomeCane");
				nomePadrone = res.getString("nomePadrone");
				razza = res.getString("razza");
				taglia = res.getString("taglia");
				anni = res.getInt("annoNascCane");
				peso = res.getDouble("peso");
				num = res.getInt("progrGara");
			} catch (SQLException e) {
			}
			if (taglia != null)
				if (taglia.equals("S")) {
					cane = new CanePiccolo(nomeCane, nomePadrone, razza, num, anni, peso, taglia);
				} else if (taglia.equals("M")) {
					cane = new CaneMedio(nomeCane, nomePadrone, razza, num, anni, peso, taglia);
				} else if (taglia.equals("L")) {
					cane = new CaneGrande(nomeCane, nomePadrone, razza, num, anni, peso, taglia);
				}
		}
		return cane;
	}

	public void update(Cane cane) {
		sql = "UPDATE cani SET tempo = " + cane.getTempo() + ", penalita = " + cane.getPenalita() + ", puntiFinali = "
				+ cane.getPunteggio() + " WHERE progrGara = " + cane.getNum();
		try {
			st.executeUpdate(sql);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

	public String graduatoria() {
		String ret = "\n";
		sql = "SELECT * FROM cani ORDER BY puntiFinali";
		ResultSet res = null;
		try {
			res = st.executeQuery(sql);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		String nomeCane, nomePadrone, razza, taglia;
		int anni, num;
		double peso, punti;
		try {
			while (res.next()) {
				nomeCane = res.getString("nomeCane");
				nomePadrone = res.getString("nomePadrone");
				razza = res.getString("razza");
				taglia = res.getString("taglia");
				anni = res.getInt("annoNascCane");
				peso = res.getDouble("peso");
				num = res.getInt("progrGara");
				punti = res.getDouble("puntiFinali");
				ret = ret + "Punteggio: " + punti + " Numero: " + num + " Cane: " + nomeCane + " Nome Padrone: "
						+ nomePadrone + " Razza: " + razza + " Taglia: " + taglia + " Anni: " + anni + " Peso: " + peso
						+ "\n";
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return ret;
	}

	public String graduatoriaPerTaglia() {
		String ret = "\n";
		sql = "SELECT * FROM cani WHERE taglia='S' ORDER BY puntiFinali";
		ResultSet res = null;
		try {
			res = st.executeQuery(sql);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		String nomeCane, nomePadrone, razza;
		int anni, num;
		double peso, punti;
		ret = ret + "TAGLIA S\n\n";
		try {
			while (res.next()) {
				nomeCane = res.getString("nomeCane");
				nomePadrone = res.getString("nomePadrone");
				razza = res.getString("razza");
				anni = res.getInt("annoNascCane");
				peso = res.getDouble("peso");
				num = res.getInt("progrGara");
				punti = res.getDouble("puntiFinali");
				ret = ret + "Punteggio: " + punti + " Numero: " + num + " Cane: " + nomeCane + " Nome Padrone: "
						+ nomePadrone + " Razza: " + razza + " Anni: " + anni + " Peso: " + peso + "\n";
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		sql = "SELECT * FROM cani WHERE taglia='M' ORDER BY puntiFinali";
		try {
			res = st.executeQuery(sql);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		ret = ret + "\nTAGLIA M\n\n";
		try {
			while (res.next()) {
				nomeCane = res.getString("nomeCane");
				nomePadrone = res.getString("nomePadrone");
				razza = res.getString("razza");
				anni = res.getInt("annoNascCane");
				peso = res.getDouble("peso");
				num = res.getInt("progrGara");
				punti = res.getDouble("puntiFinali");
				ret = ret + "Punteggio: " + punti + " Numero: " + num + " Cane: " + nomeCane + " Nome Padrone: "
						+ nomePadrone + " Razza: " + razza + " Anni: " + anni + " Peso: " + peso + "\n";
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		sql = "SELECT * FROM cani WHERE taglia='L' ORDER BY puntiFinali";
		try {
			res = st.executeQuery(sql);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		ret = ret + "\nTAGLIA L\n\n";
		try {
			while (res.next()) {
				nomeCane = res.getString("nomeCane");
				nomePadrone = res.getString("nomePadrone");
				razza = res.getString("razza");
				anni = res.getInt("annoNascCane");
				peso = res.getDouble("peso");
				num = res.getInt("progrGara");
				punti = res.getDouble("puntiFinali");
				ret = ret + "Punteggio: " + punti + " Numero: " + num + " Cane: " + nomeCane + " Nome Padrone: "
						+ nomePadrone + " Razza: " + razza + " Anni: " + anni + " Peso: " + peso + "\n";
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return ret;
	}
	
	public void chiusura() {
		try {
			st.close();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		try {
			dbconn.close();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}

}
package business;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

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
			dbconn = DriverManager.getConnection("jdbc:mysql://localhost:3306/pub?user=root&password=");
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

	public int getNum() {
		sql = "SELECT numOrd FROM ordine";
		ResultSet res = null;
		try {
			res = st.executeQuery(sql);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		int num = 0;
		try {
			while (res.next()) {
				num = res.getInt("numOrd");
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return (num + 1);
	}

	public void addSnack(String nome, double prezzo, int nOrd) {
		sql = "INSERT INTO snack VALUES (" + nOrd + ",'" + nome + "'," + prezzo + ")";
		try {
			st.executeUpdate(sql);
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}

	public void addBev(int nOrd, String nome, int stuz, double prezzo) {
		sql = "INSERT INTO bevande VALUES (" + nOrd + ",'" + nome + "'," + stuz + "," + prezzo + ")";
		try {
			st.executeUpdate(sql);
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}

	public void fineOrdine(int nOrd, int nTav, double conto) {
		sql = "INSERT INTO ordine VALUES (" + nOrd + "," + nTav + "," + conto + ",0,0,0)";
		try {
			st.executeUpdate(sql);
		} catch (SQLException e) {
			e.printStackTrace();
		}
	}

	public String prepOrd() {
		String ret = "";
		sql = "SELECT numOrd FROM ORDINE WHERE prep=0 ORDER BY numOrd";
		ResultSet res = null;
		try {
			res = st.executeQuery(sql);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		int numOrd = 0;
		try {
			res.next();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		try {
			numOrd = res.getInt("numOrd");
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		sql = "SELECT nome,stuz FROM bevande WHERE numOrd=" + numOrd;
		res = null;
		try {
			res = st.executeQuery(sql);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		String nome;
		int stuz;
		ret = ret + "Bevande:\n";
		try {
			while (res.next()) {
				nome = res.getString("nome");
				stuz = res.getInt("stuz");
				String stu;
				if (stuz == 0) {
					stu = " senza stuzzichino\n";
				} else {
					stu = " con stuzzichino\n";
				}
				ret = ret + nome + stu;
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		sql = "SELECT nome FROM snack WHERE numOrd=" + numOrd;
		res = null;
		try {
			res = st.executeQuery(sql);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		nome = "";
		ret = ret + "\n\nSnack:\n";
		try {
			while (res.next()) {
				nome = res.getString("nome");
				ret = ret + nome + "\n";
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		sql = "UPDATE ordine SET prep = 1 WHERE numOrd = " + numOrd;
		try {
			st.executeUpdate(sql);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return ret;
	}

	public String consegnaVassoio(int nOrd) {
		String ret = "";
		sql = "SELECT prep,cons FROM ordine WHERE numOrd=" + nOrd;
		ResultSet res = null;
		try {
			res = st.executeQuery(sql);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		int prep = 0,cons = 0;
		try {
			res.next();
		} catch (SQLException e1) {
			// TODO Auto-generated catch block
			e1.printStackTrace();
		}
			try {
				prep = res.getInt("prep");
			} catch (SQLException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
			try {
				cons = res.getInt("cons");
			} catch (SQLException e1) {
				// TODO Auto-generated catch block
				e1.printStackTrace();
			}
			if (prep==1 && cons==0) {
				ret="Vassoio correttamente consegnato";
				sql = "UPDATE ordine SET cons = 1 WHERE numOrd = " + nOrd;
				try {
					st.executeUpdate(sql);
				} catch (SQLException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}else {
				ret="Errore col vassoio";
			}
		return ret;
	}
	
	public double conto(int nTav) {
		sql = "SELECT conto FROM ordine WHERE nTav="+nTav+" AND pag=0";
		ResultSet res = null;
		try {
			res = st.executeQuery(sql);
		} catch (SQLException e) {
			e.printStackTrace();
		}
		double conto=0;
		try {
			while (res.next()) {
				conto = conto + res.getDouble("conto");
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return conto;
	}
	
	public void pagaConto(int nTav) {
		sql = "UPDATE ordine SET pag=1 WHERE nTav="+nTav+" AND pag=0";
		try {
			st.executeUpdate(sql);
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
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

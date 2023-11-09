package business;

import java.sql.SQLException;

import bean.Cane;

public class Gestione {

	Dao dao = new Dao();

	void newCane(Cane cane) {
		dao.insert(cane);
	}

	int getProgr() {
		return dao.getProgr();
	}

	String elencoNome() {
		String ret = "";
		try {
			ret = dao.elencoNome();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return ret;
	}

	String elencoNum() {
		String ret = "";
		try {
			ret = dao.elencoNum();
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return ret;
	}

	Cane chiamaCane() {
		return dao.chiamaCane();
	}

	void datiCane(Cane cane) {
		dao.update(cane);
	}

	String graduatoria() {
		return dao.graduatoria();
	}

	String graduatoriaPerTaglia() {
		return dao.graduatoriaPerTaglia();
	}
	
	void closedb() {
		dao.chiusura();
	}
}
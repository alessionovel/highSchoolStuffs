<?php
    
    function clean($str)
    {
        $str = strip_tags(addslashes(stripslashes(htmlspecialchars($str))));
        return $str;
    }

	function tempoesecuzionediunaquery_start() {	
		$time_start = microtime(true);
		$time_end = microtime(true);
		return $time_start;
	}
	
	function tempoesecuzionediunaquery_result($sql,$time_start) {	
		
		$time_end = microtime(true);
		$time_res = $time_end-$time_start;
		//echo "<b>".$sql."</b><br/>".number_format($time_res,5)."<br/>";
		return $time_res;
	}

	function somma($ora1,$ora2, $sep){
		$ora1 = explode($sep,$ora1);
		$ora2 = explode($sep,$ora2);
		if(count($ora1)==1) $ora1[1]="0";
		if(count($ora2)==1) $ora2[1]="0";
		//echo "L1 ".strlen($ora1[1])."<br/>";
		//echo "L2 ".strlen($ora2[1])."<br/>";
		if(strlen($ora1[1])!=2) $ora1[1] = $ora1[1]."0";
		if(strlen($ora2[1])!=2) $ora2[1] = $ora2[1]."0";
		if($ora1[1]=="000") $ora1[1]="00";
		if($ora2[1]=="000") $ora2[1]="00";	
		//echo "EXPLODE<br/>";
		//for($i=0;$i<count($ora1);$i++) echo "1 ".$i." ".$ora1[$i]."<br/>";
		//for($i=0;$i<count($ora2);$i++) echo "2 ".$i." ".$ora2[$i]."<br/>";	
		//echo "FINE EXPLODE<br/>";
		$ore     = $ora1[0] + $ora2[0];
		$minuti  = $ora1[1] + $ora2[1];
		if ($minuti  > 59){
			$minuti  = $minuti - 60;
			$ore +=1;
		}
		$ore     = str_pad($ore,2,0,STR_PAD_LEFT);
		$minuti  = str_pad($minuti,2,0,STR_PAD_LEFT);
		$risultato = $ore.".".$minuti;
		return $risultato;
	}


	function upload($ftp_server,$ftp_user_name,$ftp_user_pass,$dest_folder,$file_name) {
		set_time_limit(0);
		//$ftp_server = "ftp.natanstudio.com";
		//$ftp_user_name = "1268603@aruba.it";
		//$ftp_user_pass = "382a6baceb"; 
		// set up basic connection
		$conn_id = ftp_connect("$ftp_server"); 
		// check connection
		if (!$conn_id) { 
			echo "Ftp connection has failed!<br/>";
			echo "Attempted to connect to $ftp_server<br/>"; 
			die; 
		} else {
			echo "Connected to $ftp_server<br/>";
		}
		// login with username and password
		$login_result = ftp_login($conn_id, "$ftp_user_name", "$ftp_user_pass");
		// attiva il modo passivo
		ftp_pasv($conn_id, true);
		// check connection
		if (!$login_result) { 
			echo "Ftp connection has failed! ($login_result)<br/>";
			echo "Attempted to login to $ftp_server for user $ftp_user_name<br/>"; 
			die; 
		} else {
			echo "Logged into $ftp_server, for user $ftp_user_name<br/>";
			$pwd = ftp_pwd($conn_id);
			echo "Present working directory is $pwd<br/>";
			$upload = ftp_chdir($conn_id,$dest_folder);
			$pwd = ftp_pwd($conn_id);
			$files = $_FILES[$file_name];
			$filess = $files['tmp_name'];
			$filed = $files['name'];
			echo "Present working directory is $pwd<br/>";
			$ok = true;
			if (ftp_put($conn_id, $filed, $filess, FTP_BINARY)) {
				 echo "$files in $filed trasferito correttamente<br/>";
			} else {
				 $ok = false;
			}
		}	 
		// close the FTP stream 
		ftp_quit($conn_id);
	}

	function ingtoita($sData) {
		$giorno = substr($sData,8,2);
		$mese = substr($sData,5,2);
		$anno = substr($sData,0,4);
		$ingtoita = $giorno . "/" . $mese . "/" . $anno;
		return $ingtoita;
	}
	function ingtoitahm($sData) {
		$giorno = substr($sData,8,2);
		$mese = substr($sData,5,2);
		$anno = substr($sData,0,4);
		$ora = substr($sData,11,2);
		$minuti = substr($sData,14,2);
		$secondi = substr($sData,17,2);
		$ingtoitahm = $giorno . "/" . $mese . "/" . $anno . " " . $ora . ":" .  $minuti;
		return $ingtoitahm;
		//return $ingtoitahm;
	}
    function ingtoitahmnon($sData) {
        $giorno = substr($sData,8,2);
        $mese = substr($sData,5,2);
        $anno = substr($sData,0,4);
        $ora = substr($sData,11,2);
        $minuti = substr($sData,14,2);
        $secondi = substr($sData,17,2);
        $ingtoitahm = $giorno . "/" . $mese . "/" . $anno . " " . $ora . ":" .  $minuti;
        return $ingtoitahm;
        //return $ingtoitahm;
    }
	function ingtoitaestesa($sData) {
		$giorno = substr($sData,8,2);
		$mese = substr($sData,5,2);
		$anno = substr($sData,0,4);
		$ingtoitaestesa = $giorno . "/" . $mese . "/" . $anno . " " . substr($sData,11,2) . ":" . substr($sData,14,2);
		return $ingtoitaestesa;
	}
	function itatoing($sData) {
		$giorno = substr($sData,0,2);
		$mese = substr($sData,3,2);
		$anno = substr($sData,6);
		$itatoing = $anno . "/" . $mese . "/" . $giorno;
		return $itatoing;
	}
	function itatoinghm($sData) {
		$giorno = substr($sData,0,2);
		$mese = substr($sData,3,2);
		$anno = substr($sData,6,4);
		$ora = substr($sData,11,2);
		$minuti = substr($sData,14,2);
		$secondi = substr($sData,17,2);
		$itatoinghm = $anno . "/" . $mese . "/" . $giorno . " " . $ora . ":" .  $minuti;
		return $itatoinghm;		
	}
	function itatoinghms($sData) {
		$giorno = substr($sData,0,2);
		$mese = substr($sData,3,2);
		$anno = substr($sData,6,4);
		$ora = substr($sData,11,2);
		$minuti = substr($sData,14,2);
		//$secondi = substr($sData,17,2);
		$itatoinghm = $anno . "/" . $mese . "/" . $giorno . " " . $ora . ":" .  $minuti;
		return $itatoinghm;		
	}
	function estrainome($nome) {
		$lungh = strlen($nome);
		$pos = $lungh;
		$trovato = false;
		do {
			if (substr($nome,$pos,1)!="\\") {
				$pos--;
			}
			else {
				$trovato = true;
			}
		} while (($trovato==false) && ($pos>0));
		$estrainome = substr($nome,$pos+1);
		return $estrainome;
	}

	function salvaeuro($valore) {
		$result = -1;
		if ((strlen($valore)==0) || ((strlen($valore)==1) && ($valore==","))) {
			return "0.00";
		}
		// elimino i punti di separazione delle migliaia
		$pos = 0;
		$nvalore = "";
		while ($pos<strlen($valore)) {
			if (substr($valore,$pos,1)!=".") {
				$nvalore .= substr($valore,$pos,1);
			}
			$pos++;
		};
		$valore = $nvalore;
		// vedo se &egrave; stata inserita la virgola dei decimali dell'euro
      	$pos=strpos($valore,',');
		//echo "pos $pos<br/>";
		if (($pos) || (substr($valore,0,1)==",")) {
			// &egrave; stata inserita almeno una virgola
			if (strpos($valore,",",$pos+1)) {
				// errore ci sono almeno due virgole
				return "0.00";
			}
			else {
				if(substr($valore,0,1)==",") {
					// ho inserito un valore tipo ,55
					$valore = "0" . $valore;
					$pos = 1; 
					//echo "--> $valore<br/>";
				}
				// c'&egrave; una sola virgola quindi controllo quanti decimali ci sono
				$destra = substr($valore,$pos);
				echo "destra $destra<br/>";
				if (strlen($destra)==1) {
					// c'&egrave; solo la virgola e quindi devo aggiungere due zeri
					$valore = substr($valore,0,$pos).".00";
				}
				if (strlen($destra)==2) {
					// c'&egrave; la virgola con un decimale e quindi devo aggiungere uno zero
					$valore = substr($valore,0,$pos).".".substr($destra,1)."0";
				}
				if (strlen($destra)>=3) {
					// ci sono più di due decimali e quindi tronco
					$valore = substr($valore,0,strpos($valore,",")) . "." . substr($valore,$pos+1,2);
				}
			}
		}
		else {
			// non c'&egrave; nemmeno una virgola e quindi aggiungo due zeri
			$valore .= ".00";
		}
		return $valore;
	}
	
	function caricaeuro($valore) {
		$lungh = strlen($valore);
		if ($lungh<=6) {
			// non ci sono abbastanza cifre per le migliaia
			$valore = str_replace(".",",",$valore);
			return $valore;
		}
		else {
			// converto il punto decimale in virgola
			$nvalore = "";
			$valore = str_replace(".",",",$valore);
			$pos = strpos($valore,",");
			$decimali = substr($valore,$pos);
			$pos--;
			$conta = 1;
			// metto i punti di separazione delle migliaia
			while ($pos>-1) {
				$conta++;
				$nvalore = substr($valore,$pos,1) . $nvalore;
				//echo "$nvalore<br/>";
				if ($conta==4) {
					$nvalore = "." . $nvalore;
					$conta = 1;
				}
				$pos--;
			}
			if(substr($nvalore,0,1)==".") {
				$nvalore = substr($nvalore,1);
			}
			$valore = $nvalore . $decimali;
			return $valore;
		}
	}
	
	function cut_parola($campo,$lunghezza) { 
	
		$cut            = ""; 
		$campo             = explode(" ",$campo); 
		$count_words    = count($campo); 
		$len_cutword     = $lunghezza; 
	
			for($i=0; $i<$len_cutword; $i++){ 
				if ($i<$count_words){ 
					$cut .= $campo[$i]." "; 
				} 
			} 
	
			if ($count_words>$len_cutword) { 
					$cut .= "..."; 
			}
				return $cut; 
		}
	
	function leggitabella($nometabella,$chiave,$campo) {
		$sql = "select ".$campo." from ".$nometabella." where id='".$chiave."'";
		$rec = mysql_db_Query($_SESSION['dbname'], $sql) or die($sql." ### Errore in leggitabella");
		$num = mysql_num_rows($rec);
		if ($num!=0) {
			$genere = mysql_result($rec,0,$campo);
			return $genere;
		}
		else {
			return "";
		}
	}
	
	function callsql($sql) {
		$rec = mysql_db_Query($_SESSION['dbname'], $sql) or die($sql."<br/>".mysql_error());
		if ($_SESSION['debug']) echo "$sql<br/>";
		return $rec;
	}
	
	function buildselect($tabella,$id,$campo,$name,$opzionesel) {
		$sql = "select ".$id.",".$campo." from ".$tabella." order by ".$campo;
		$rec = callsql($sql);
		$num = mysql_num_rows($rec);
		if($num!=0) {
			?>
			<select name="<?php echo $name; ?>" size="1">
			<?php
				for($i=0;$i<$num;$i++) {
					$idl = mysql_result($rec,$i,$id);
					$campol = mysql_result($rec,$i,$campo);
					?>
					<option value="<?php echo $idl; ?>"
					<?php
						if ($idl==$opzionesel) {?>
							selected
						<?php
						}?>
						><?php echo $campol; ?></option>
					<?php
				}
			?>
			</select>
			<?php
		}
	}
	
	function nuovorecord($nometabella,$len) {
		$new = "";
		for($i=0;$i<$len-1;$i++) {
			$new .= "0";
		}
		$sql = "select id from ".$nometabella." order by id desc";
		$rec = mysql_db_Query($_SESSION['dbname'], $sql);
		$num = mysql_num_rows($rec);
		if ($num==0) { 
			$id_new = $new."1";
		}
		else {
			$id_old = mysql_result($rec,0,"id");
			settype ($id_old,"integer");
			$id_old = $id_old + 1;
			$id_old = $new . $id_old;
			$id_new = substr($id_old,strlen($id_old)-$len);
		}
		return $id_new;
	}
	
	function ignorahtml($testo) {
		$tst = strip_tags($testo,"<em><b></b></em><i></i><br/><strong></strong>");			
		/*if (substr($testo,0,1)=="<") {
			//echo "dentro 1";
			// inizio con un tag
			if (strpos($testo,">")===false) {
				// situazione di errore
				$tst = $testo;
			}
			else {
				$chiuditag = strpos($testo,">");
				$tst = substr($testo,$chiuditag+1);
			}
			if (substr($tst,strlen($tst)-1,1)==">") {
				//echo "dentro 2";
				for($t=strlen($tst);$t>0;$t--) {
					if (substr($tst,$t,1)=="<") {
						//echo " dentro apritag";
						$apritag = $t;
						$t = -1;
					}
				}
				if ($t==0) {
					// situazione di errore
					$tst = $testo;
				}
				else {
					$tst = substr($tst,0,$apritag);
				}					
			}
		}
		else {
			$tst = $testo;
		}*/
		return $tst;
	}
?>

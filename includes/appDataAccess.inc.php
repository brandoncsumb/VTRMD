<?php
include_once 'genericDataAccess.inc.php';
/*
 * Inserts record rows into the dv_test_locations table. The dv_test_locations
 * table is the first set in mormalization.
 */
function insertLocation($master_id, $location_id, $lat, $long){
	$sql = "INSERT INTO `sale7312`.`dv_test_locations` (`Master_ID`, `LocationID`, `Geo_location`, `Updated`) VALUES (:master_id, :location_id, GeomFromText('POINT(". $lat ." ". $long .")',0), CURRENT_TIMESTAMP);";
	$sql1 = "UPDATE `sale7312`.`dv_test_locations`
    		SET 
    		Master_ID = :master_id,
			LocationID = :location_id,
			Geo_location = GeomFromText('POINT(". $lat ." ". $long .")',0),
			Updated = CURRENT_TIMESTAMP
		    WHERE Master_ID = :master_id";	
	//The named parameters for this call
	$parameters = array();
	$parameters[':master_id'] = $master_id;
	$parameters[':location_id'] = $location_id;
	//$parameters[':lat'] = $lat;
	//$parameters[':long'] = $long;
	$result2 = array();
    $result2['data_rows_inserted'] = 0;
	$result2['data_rows_updated'] = 0;
	$result2['db_name'] = "";
	try{
    	$re = insertRecord($sql, $parameters);
		$result2['data_rows_inserted'] = 1;
		$result2['data_rows_updated'] = 0;
		$result2['db_name'] = "dv_test_locations";
	}
	catch(Exception $ex) {
		try{
			$re = insertRecord($sql1, $parameters);
			$result2['data_rows_updated'] = 1;
			$result2['data_rows_inserted'] = 0;
			$result2['db_name'] = "dv_test_locations";
		}
		catch(Exception $ex){
			$re = -1;
			$result2['data_rows_updated'] = 0;
			$result2['data_rows_inserted'] = 0;
			$result2['db_name'] = "error";
		}
	}
	return $result2;
} 
/*
 * Inserts records into the main dv_calspeed_data table for the CalSpeed web
 * application.
 */
function insertCalSpeedData($data){
	
    	$sql1 = "UPDATE `sale7312`.`dv_calspeed_data`
        		SET 
        		Master_ID = :Master_ID,
        		Tester = :Tester,
				LocationID = :LocationID,
				Date = :Date,
				Time = :Time,
				Provider = :Provider,
				Operator = :Operator,
				Network = :Network,
				DeviceType = :DeviceType,
				NormalLAT = :NormalLAT,
				NormalLONG = :NormalLONG,
				cwTr_hops = :cwTr_hops,
				cwStartISP = :cwStartISP,
				cwStartHops = :cwStartHops,
				cwStartRTT = :cwStartRTT,
				cwTnISP1 = :cwTnISP1,
				cwTnHops1 = :cwTnHops1,
				cwTnRTT1 = :cwTnRTT1,
				cwTnISP2 = :cwTnISP2,
				cwTnHops2 = :cwTnHops2,
				cwTnRTT2 = :cwTnRTT2,
				cwTnISP3 = :cwTnISP3,
				cwTnHops3 = :cwTnHops3,
				cwTnRTT3 = :cwTnRTT3,
				cwTnISP4 = :cwTnISP4,
				cwTnHops4 = :cwTnHops4,
				cwTnRTT4 = :cwTnRTT4,
				cwTnISP5 = :cwTnISP5,
				cwTnHops5 = :cwTnHops5,
				cwTnRTT5 = :cwTnRTT5,
				cwTnISP6 = :cwTnISP6,
				cwTnHops6 = :cwTnHops6,
				cwTnRTT6 = :cwTnRTT6,
				cwTnISP7 = :cwTnISP7,
				cwTnHops7 = :cwTnHops7,
				cwTnRTT7 = :cwTnRTT7,
				cwTnISP8 = :cwTnISP8,
				cwTnHops8 = :cwTnHops8,
				cwTnRTT8 = :cwTnRTT8,
				cwTnISP9 = :cwTnISP9,
				cwTnHops9 = :cwTnHops9,
				cwTnRTT9 = :cwTnRTT9,
				cwTnISP10 = :cwTnISP10,
				cwTnHops10 = :cwTnHops10,
				cwTnRTT10 = :cwTnRTT10,
				cwEndISP = :cwEndISP,
				cwEndHops = :cwEndHops,
				cwEndRTT = :cwEndRTT,
				eTr_hops = :eTr_hops,
				eStartISP = :eStartISP,
				eStartHops = :eStartHops,
				eStartRTT = :eStartRTT,
				eTnISP1 = :eTnISP1,
				eTnHops1 = :eTnHops1,
				eTnRTT1 = :eTnRTT1,
				eTnISP2 = :eTnISP2,
				eTnHops2 = :eTnHops2,
				eTnRTT2 = :eTnRTT2,
				eTnISP3 = :eTnISP3,
				eTnHops3 = :eTnHops3,
				eTnRTT3 = :eTnRTT3,
				eTnISP4 = :eTnISP4,
				eTnHops4 = :eTnHops4,
				eTnRTT4 = :eTnRTT4,
				eTnISP5 = :eTnISP5,
				eTnHops5 = :eTnHops5,
				eTnRTT5 = :eTnRTT5,
				eTnISP6 = :eTnISP6,
				eTnHops6 = :eTnHops6,
				eTnRTT6 = :eTnRTT6,
				eTnISP7 = :eTnISP7,
				eTnHops7 = :eTnHops7,
				eTnRTT7 = :eTnRTT7,
				eTnISP8 = :eTnISP8,
				eTnHops8 = :eTnHops8,
				eTnRTT8 = :eTnRTT8,
				eTnISP9 = :eTnISP9,
				eTnHops9 = :eTnHops9,
				eTnRTT9 = :eTnRTT9,
				eTnISP10 = :eTnISP10,
				eTnHops10 = :eTnHops10,
				eTnRTT10 = :eTnRTT10,
				eEndISP = :eEndISP,
				eEndHops = :eEndHops,
				eEndRTT = :eEndRTT,
				owTr_hops = :owTr_hops,
				owStartISP = :owStartISP,
				owStartHops = :owStartHops,
				owStartRTT = :owStartRTT,
				owTnISP1 = :owTnISP1,
				owTnHops1 = :owTnHops1,
				owTnRTT1 = :owTnRTT1,
				owTnISP2 = :owTnISP2,
				owTnHops2 = :owTnHops2,
				owTnRTT2 = :owTnRTT2,
				owTnISP3 = :owTnISP3,
				owTnHops3 = :owTnHops3,
				owTnRTT3 = :owTnRTT3,
				owTnISP4 = :owTnISP4,
				owTnHops4 = :owTnHops4,
				owTnRTT4 = :owTnRTT4,
				owTnISP5 = :owTnISP5,
				owTnHops5 = :owTnHops5,
				owTnRTT5 = :owTnRTT5,
				owTnISP6 = :owTnISP6,
				owTnHops6 = :owTnHops6,
				owTnRTT6 = :owTnRTT6,
				owTnISP7 = :owTnISP7,
				owTnHops7 = :owTnHops7,
				owTnRTT7 = :owTnRTT7,
				owTnISP8 = :owTnISP8,
				owTnHops8 = :owTnHops8,
				owTnRTT8 = :owTnRTT8,
				owTnISP9 = :owTnISP9,
				owTnHops9 = :owTnHops9,
				owTnRTT9 = :owTnRTT9,
				owTnISP10 = :owTnISP10,
				owTnHops10 = :owTnHops10,
				owTnRTT10 = :owTnRTT10,
				owEndISP = :owEndISP,
				owEndHops = :owEndHops,
				owEndRTT = :owEndRTT
				WHERE Master_ID = :Master_ID";
			  	
			  $sql2 = "INSERT INTO `sale7312`.`dv_calspeed_data` (
				 `Master_ID`,
				 `Tester`,
				 `LocationID`,
				 `Date`, 
				 `Time`, 
				 `Provider`, 
				 `Operator`, 
				 `Network`, 
				 `DeviceType`, 
				 `NormalLAT`, 
				 `NormalLONG`, 
				 `cwTr_hops`, 
				 `cwStartISP`, 
				 `cwStartHops`, 
				 `cwStartRTT`, 
				 `cwTnISP1`, 
				 `cwTnHops1`, 
				 `cwTnRTT1`, 
				 `cwTnISP2`, 
				 `cwTnHops2`, 
				 `cwTnRTT2`, 
				 `cwTnISP3`, 
				 `cwTnHops3`, 
				 `cwTnRTT3`, 
				 `cwTnISP4`, 
				 `cwTnHops4`, 
				 `cwTnRTT4`, 
				 `cwTnISP5`, 
				 `cwTnHops5`, 
				 `cwTnRTT5`, 
				 `cwTnISP6`, 
				 `cwTnHops6`, 
				 `cwTnRTT6`, 
				 `cwTnISP7`, 
				 `cwTnHops7`, 
				 `cwTnRTT7`, 
				 `cwTnISP8`, 
				 `cwTnHops8`, 
				 `cwTnRTT8`, 
				 `cwTnISP9`, 
				 `cwTnHops9`, 
				 `cwTnRTT9`, 
				 `cwTnISP10`, 
				 `cwTnHops10`, 
				 `cwTnRTT10`, 
				 `cwEndISP`, 
				 `cwEndHops`, 
				 `cwEndRTT`, 
				 `eTr_hops`, 
				 `eStartISP`, 
				 `eStartHops`, 
				 `eStartRTT`, 
				 `eTnISP1`, 
				 `eTnHops1`, 
				 `eTnRTT1`, 
				 `eTnISP2`, 
				 `eTnHops2`, 
				 `eTnRTT2`, 
				 `eTnISP3`, 
				 `eTnHops3`, 
				 `eTnRTT3`, 
				 `eTnISP4`, 
				 `eTnHops4`, 
				 `eTnRTT4`, 
				 `eTnISP5`, 
				 `eTnHops5`, 
				 `eTnRTT5`, 
				 `eTnISP6`, 
				 `eTnHops6`, 
				 `eTnRTT6`, 
				 `eTnISP7`, 
				 `eTnHops7`, 
				 `eTnRTT7`, 
				 `eTnISP8`, 
				 `eTnHops8`, 
				 `eTnRTT8`, 
				 `eTnISP9`, 
				 `eTnHops9`, 
				 `eTnRTT9`, 
				 `eTnISP10`, 
				 `eTnHops10`, 
				 `eTnRTT10`, 
				 `eEndISP`, 
				 `eEndHops`, 
				 `eEndRTT`, 
				 `owTr_hops`, 
				 `owStartISP`, 
				 `owStartHops`,
				 `owStartRTT`, 
				 `owTnISP1`, 
				 `owTnHops1`, 
				 `owTnRTT1`, 
				 `owTnISP2`, 
				 `owTnHops2`, 
				 `owTnRTT2`, 
				 `owTnISP3`, 
				 `owTnHops3`, 
				 `owTnRTT3`, 
				 `owTnISP4`, 
				 `owTnHops4`, 
				 `owTnRTT4`, 
				 `owTnISP5`, 
				 `owTnHops5`, 
				 `owTnRTT5`, 
				 `owTnISP6`, 
				 `owTnHops6`, 
				 `owTnRTT6`, 
				 `owTnISP7`, 
				 `owTnHops7`, 
				 `owTnRTT7`, 
				 `owTnISP8`, 
				 `owTnHops8`, 
				 `owTnRTT8`, 
				 `owTnISP9`, 
				 `owTnHops9`, 
				 `owTnRTT9`, 
				 `owTnISP10`, 
				 `owTnHops10`, 
				 `owTnRTT10`, 
				 `owEndISP`, 
				 `owEndHops`, 
				 `owEndRTT`)
				  VALUES(
				  :Master_ID, 
				  :Tester, 
				  :LocationID, 
				  :Date, 
				  :Time, 
				  :Provider, 
				  :Operator, 
				  :Network, 
				  :DeviceType, 
				  :NormalLAT, 
				  :NormalLONG, 
				  :cwTr_hops, 
				  :cwStartISP, 
				  :cwStartHops, 
				  :cwStartRTT, 
				  :cwTnISP1, 
				  :cwTnHops1,  
				  :cwTnRTT1, 
				  :cwTnISP2, 
				  :cwTnHops2, 
				  :cwTnRTT2, 
				  :cwTnISP3, 
				  :cwTnHops3, 
				  :cwTnRTT3, 
				  :cwTnISP4, 
				  :cwTnHops4, 
				  :cwTnRTT4, 
				  :cwTnISP5, 
				  :cwTnHops5, 
				  :cwTnRTT5, 
				  :cwTnISP6, 
				  :cwTnHops6, 
				  :cwTnRTT6, 
				  :cwTnISP7, 
				  :cwTnHops7, 
				  :cwTnRTT7, 
				  :cwTnISP8, 
				  :cwTnHops8, 
				  :cwTnRTT8, 
				  :cwTnISP9, 
				  :cwTnHops9, 
				  :cwTnRTT9, 
				  :cwTnISP10, 
				  :cwTnHops10, 
				  :cwTnRTT10, 
				  :cwEndISP, 
				  :cwEndHops, 
				  :cwEndRTT, 
				  :eTr_hops, 
				  :eStartISP, 
				  :eStartHops, 
				  :eStartRTT, 
				  :eTnISP1, 
				  :eTnHops1, 
				  :eTnRTT1, 
				  :eTnISP2, 
				  :eTnHops2, 
				  :eTnRTT2, 
				  :eTnISP3, 
				  :eTnHops3, 
				  :eTnRTT3, 
				  :eTnISP4, 
				  :eTnHops4, 
				  :eTnRTT4, 
				  :eTnISP5, 
				  :eTnHops5, 
				  :eTnRTT5, 
				  :eTnISP6, 
				  :eTnHops6, 
				  :eTnRTT6, 
				  :eTnISP7, 
				  :eTnHops7, 
				  :eTnRTT7, 
				  :eTnISP8, 
				  :eTnHops8, 
				  :eTnRTT8, 
				  :eTnISP9, 
				  :eTnHops9, 
				  :eTnRTT9, 
				  :eTnISP10, 
				  :eTnHops10, 
				  :eTnRTT10, 
				  :eEndISP, 
				  :eEndHops, 
				  :eEndRTT, 
				  :owTr_hops, 
				  :owStartISP, 
				  :owStartHops,
				  :owStartRTT, 
				  :owTnISP1, 
				  :owTnHops1, 
				  :owTnRTT1, 
				  :owTnISP2, 
				  :owTnHops2, 
				  :owTnRTT2, 
				  :owTnISP3, 
				  :owTnHops3, 
				  :owTnRTT3, 
				  :owTnISP4, 
				  :owTnHops4, 
				  :owTnRTT4, 
				  :owTnISP5, 
				  :owTnHops5, 
				  :owTnRTT5, 
				  :owTnISP6, 
				  :owTnHops6, 
				  :owTnRTT6, 
				  :owTnISP7, 
				  :owTnHops7, 
				  :owTnRTT7, 
				  :owTnISP8, 
				  :owTnHops8, 
				  :owTnRTT8, 
				  :owTnISP9, 
				  :owTnHops9, 
				  :owTnRTT9, 
				  :owTnISP10, 
				  :owTnHops10, 
				  :owTnRTT10, 
				  :owEndISP, 
				  :owEndHops, 
				  :owEndRTT)";
				  
    $parameters = array();
    $parameters[':Master_ID'] = $data[1];
	$parameters[':Tester'] = $data[2];
    $parameters[':LocationID'] = $data[3];
    //Format Date
    $predate = $data[4].$data[5];
    $phpdate = strtotime($predate);
	$mysqldate = date('Y-m-d H:i:s',$phpdate);
    $parameters[':Date'] = $mysqldate;
    $parameters[':Time'] = $data[5];
    $parameters[':Provider'] = $data[6];
    $parameters[':Operator'] = $data[7];
    $parameters[':Network'] = $data[8];
    $parameters[':DeviceType'] = $data[9];
    $parameters[':NormalLAT'] = $data[10];
    $parameters[':NormalLONG'] = $data[11];
    $parameters[':cwTr_hops'] = $data[12];
    $parameters[':cwStartISP'] = $data[13];
    $parameters[':cwStartHops'] = $data[14];
    $parameters[':cwStartRTT'] = $data[15];
    $parameters[':cwTnISP1'] = $data[16];
    $parameters[':cwTnHops1'] = $data[17];
    $parameters[':cwTnRTT1'] = $data[18];
    $parameters[':cwTnISP2'] = $data[19];
    $parameters[':cwTnHops2'] = $data[20];
    $parameters[':cwTnRTT2'] = $data[21];
    $parameters[':cwTnISP3'] = $data[22];
    $parameters[':cwTnHops3'] = $data[23];
    $parameters[':cwTnRTT3'] = $data[24];
    $parameters[':cwTnISP4'] = $data[25];
    $parameters[':cwTnHops4'] = $data[26];
    $parameters[':cwTnRTT4'] = $data[27];
    $parameters[':cwTnISP5'] = $data[28];
    $parameters[':cwTnHops5'] = $data[29];
    $parameters[':cwTnRTT5'] = $data[30];
    $parameters[':cwTnISP6'] = $data[31];
    $parameters[':cwTnHops6'] = $data[32];
    $parameters[':cwTnRTT6'] = $data[33];
    $parameters[':cwTnISP7'] = $data[34];
    $parameters[':cwTnHops7'] = $data[35];
    $parameters[':cwTnRTT7'] = $data[36];
    $parameters[':cwTnISP8'] = $data[37];
    $parameters[':cwTnHops8'] = $data[38];
    $parameters[':cwTnRTT8'] = $data[39];
    $parameters[':cwTnISP9'] = $data[40];
    $parameters[':cwTnHops9'] = $data[41];
    $parameters[':cwTnRTT9'] = $data[42];
    $parameters[':cwTnISP10'] = $data[43];
    $parameters[':cwTnHops10'] = $data[44];
    $parameters[':cwTnRTT10'] = $data[45];
    $parameters[':cwEndISP'] = $data[46];
    $parameters[':cwEndHops'] = $data[47];
    $parameters[':cwEndRTT'] = $data[48];
    $parameters[':eTr_hops'] = $data[49];
    $parameters[':eStartISP'] = $data[50];
    $parameters[':eStartHops'] = $data[51];
    $parameters[':eStartRTT'] = $data[52];
    $parameters[':eTnISP1'] = $data[53];
    $parameters[':eTnHops1'] = $data[54];
    $parameters[':eTnRTT1'] = $data[55];
    $parameters[':eTnISP2'] = $data[56];
    $parameters[':eTnHops2'] = $data[57];
    $parameters[':eTnRTT2'] = $data[58];
    $parameters[':eTnISP3'] = $data[59];
    $parameters[':eTnHops3'] = $data[60];
    $parameters[':eTnRTT3'] = $data[61];
    $parameters[':eTnISP4'] = $data[62];
    $parameters[':eTnHops4'] = $data[63];
    $parameters[':eTnRTT4'] = $data[64];
    $parameters[':eTnISP5'] = $data[65];
    $parameters[':eTnHops5'] = $data[66];
    $parameters[':eTnRTT5'] = $data[67];
    $parameters[':eTnISP6'] = $data[68];
    $parameters[':eTnHops6'] = $data[69];
    $parameters[':eTnRTT6'] = $data[70];
    $parameters[':eTnISP7'] = $data[71];
    $parameters[':eTnHops7'] = $data[72];
    $parameters[':eTnRTT7'] = $data[73];
    $parameters[':eTnISP8'] = $data[74];
    $parameters[':eTnHops8'] = $data[75];
    $parameters[':eTnRTT8'] = $data[76];
    $parameters[':eTnISP9'] = $data[77];
    $parameters[':eTnHops9'] = $data[78];
    $parameters[':eTnRTT9'] = $data[79];
    $parameters[':eTnISP10'] = $data[80];
    $parameters[':eTnHops10'] = $data[81];
    $parameters[':eTnRTT10'] = $data[82];
    $parameters[':eEndISP'] = $data[83];
    $parameters[':eEndHops'] = $data[84];
    $parameters[':eEndRTT'] = $data[85];
    $parameters[':owTr_hops'] = $data[86];
    $parameters[':owStartISP'] = $data[87];
    $parameters[':owStartHops'] = $data[88];
    $parameters[':owStartRTT'] = $data[89];
    $parameters[':owTnISP1'] = $data[90];
    $parameters[':owTnHops1'] = $data[91];
    $parameters[':owTnRTT1'] = $data[92];
    $parameters[':owTnISP2'] = $data[93];
    $parameters[':owTnHops2'] = $data[94];
    $parameters[':owTnRTT2'] = $data[95];
    $parameters[':owTnISP3'] = $data[96];
    $parameters[':owTnHops3'] = $data[97];
    $parameters[':owTnRTT3'] = $data[98];
    $parameters[':owTnISP4'] = $data[99];
    $parameters[':owTnHops4'] = $data[100];
    $parameters[':owTnRTT4'] = $data[101];
    $parameters[':owTnISP5'] = $data[102];
    $parameters[':owTnHops5'] = $data[103];
    $parameters[':owTnRTT5'] = $data[104];
    $parameters[':owTnISP6'] = $data[105];
    $parameters[':owTnHops6'] = $data[106];
    $parameters[':owTnRTT6'] = $data[107];
    $parameters[':owTnISP7'] = $data[108];
    $parameters[':owTnHops7'] = $data[109];
    $parameters[':owTnRTT7'] = $data[110];
    $parameters[':owTnISP8'] = $data[111];
    $parameters[':owTnHops8'] = $data[112];
    $parameters[':owTnRTT8'] = $data[113];
    $parameters[':owTnISP9'] = $data[114];
    $parameters[':owTnHops9'] = $data[115];
    $parameters[':owTnRTT9'] = $data[116];
    $parameters[':owTnISP10'] = $data[117];
    $parameters[':owTnHops10'] = $data[118];
    $parameters[':owTnRTT10'] = $data[119];
    $parameters[':owEndISP'] = $data[120];
    $parameters[':owEndHops'] = $data[121];
	$parameters[':owEndRTT'] = $data[122];
    $result = array();
    $result['data_rows_inserted'] = 0;
	$result['data_rows_updated'] = 0;
	$result['db_name'] = "";
	try{
    	$re = insertRecord($sql2, $parameters);
		$result['data_rows_inserted'] = 1;
		$result['data_rows_updated'] = 0;
		$result['db_name'] = "dv_calspeed_data";
	}
	catch(Exception $ex) {
		try{
			$re = insertRecord($sql1, $parameters);
			$result['data_rows_updated'] = 1;
			$result['data_rows_inserted'] = 0;
			$result['db_name'] = "dv_calspeed_data";
		}
		catch(Exception $ex){
			$re = -1;
			$result['data_rows_updated'] = 0;
			$result['data_rows_inserted'] = 0;
			$result['db_name'] = "error";
		}
	}
    return $result;
}




function getTestDataByLocation($locationId) {

	$sql = "SELECT * FROM `dv_calspeed_data` \n"
               . "WHERE `dv_calspeed_data`.`LocationID` = :LocationID";
	
	//The named parameters for this call	   
	$parameters = array();
	$parameters[':LocationID'] = $locationId;
        
	
	//Call the function for output
	$results = fetchAllRecords($sql, $parameters);
        
        return $results;
}

function getAllTestLocations() {

	$sql = "SELECT \n"
                . "`Master_ID`, \n"
                . "`LocationID`, \n"
                . "X(`Geo_location`) AS Latitiude, \n"
                . "Y(`Geo_location`) AS Longitude, \n"
                . "`Updated` \n"
                . "FROM `dv_test_locations` \n"
                . "WHERE 1";
        
	//The named parameters for this call	   
	
	
	//Call the function for output
	$results = fetchAllRecords($sql);
        
        return $results;
}


function getDashboard(){
	
	$dashboardItems = array();
	
	//Get the total number of orders to date
	$dashboardItems['Total Records Onhand'] = getOrdersToDate();
	//Get the average item cost at the OE
	$dashboardItems['Average Item Cost'] = number_format(getAverageItemCost(),2);
	//Get the average amout of all orders to date
	$dashboardItems['Average Order Total'] = number_format(getAverageOrderCost(),2);
	//Get the number of Healthy Choices in OE
	$dashboardItems['Healthy Choices'] = getHealthyChoiceCount();
	//Get the gross sales to date
	$dashboardItems['Gross Sales to Date'] = getGrossSalesToDate();
	
	uiDashboard($dashboardItems);
}

/*
 * Fetches the total number of records in the visualization database.
 * This query only fetches records rows which are based on master_id.
 * The real number of tests 
 */
function getTotalNumberOfRecords(){
	
	$sql = "SELECT COUNT(`*`) \n"
             . "AS 'total_records' \n"
             . "FROM `dv_test_locations` \n"
             . "WHERE 1";
	
	$record = fetchRecord($sql);
	
	return $record['total_records'];
}

function getAverageItemCost()
{
	$sql = "SELECT AVG(`price`) AS 'Average' FROM `oe_product` WHERE 1";
	
	$record = fetchRecord($sql);
	
	return $record['Average'];
	
}

function getAverageOrderCost()
{
	$sql = "SELECT AVG(p.price * op.qty) AS 'AOT' \n"
           . "FROM `oe_orderProduct` op\n"
           . "INNER JOIN `oe_product` p\n"
           . "ON p.productId = op.productId";
           
    $record = fetchRecord($sql);
    
    return $record['AOT'];
}

function getHealthyChoiceCount()
{
	$sql = "SELECT COUNT(`productId`) AS 'HIC' FROM\n"
	     . "`oe_product` WHERE `healthyChoice` = 1";
		 
	$record = fetchRecord($sql);
	
	return $record['HIC'];
}

function getGrossSalesToDate()
{
	
    $sql = "SELECT SUM(Sales) AS 'GSTD' FROM (\n"
         . "SELECT SUM(qty * p.price) AS 'Sales'\n"
         . "FROM `oe_orderProduct` op\n"
         . "RIGHT JOIN `oe_product` p\n"
         . "ON op.productId = p.productId\n"
         . "GROUP BY op.`productId`) salesTable";
    
    $record = fetchRecord($sql);
		   
    return $record['GSTD'];
}

function logEmailMessage($to, $subject, $message){
	
	$sql = "INSERT INTO `dv_emailLog`(`to`, `subject`, `message`) \n"
                . "VALUES (:to,:subject,:message);";
        
        $parameters = array();
        
        $parameters[':to'] = $to;
        $parameters[':subject'] = $subject;
        $parameters[':message'] = $message;
        
        if(!insertRecord($sql, $parameters)){
            //TODO: Log to local file on db insert failure
        }
	
}



?>

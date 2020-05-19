/*DROP PROCEDURE IF EXISTS  generarFolioEnFechaProcederu;

delimiter ;;
CREATE PROCEDURE generarFolioEnFechaProcederu()
BEGIN		
		SELECT @folio_db      := folio FROM folios_alumno ORDER BY id DESC LIMIT 1;
		SELECT @sub_fecha_db  := SUBSTRING(@folio_db, 1,2);	
		SELECT @fecha_act_sys := SUBSTRING(YEAR(NOW()),  3, 2);		
		SELECT @numero_db     := LPAD(numero+1,'4','0') FROM folios_alumno ORDER BY id DESC LIMIT 1;	
		SELECT @timestamps    := NOW();	
		SELECT @fecha_insert  := CONCAT(@fecha_act_sys,'0001');
		
		#VERIFICAR FECHA Y NUMEROS 
		IF @sub_fecha_db = @fecha_act_sys  THEN 		
				SELECT CONCAT(@sub_fecha_db,@numero_db);
				INSERT INTO folios_alumno(numero, folio, created_at, updated_at) VALUES(  @numero_db, 
																																									CONCAT(@sub_fecha_db,@numero_db), 
																																									@timestamps, 
																																									@timestamps);										
		ELSEIF @fecha_act_sys > @sub_fecha_db THEN				
				INSERT INTO folios_alumno(numero, folio, created_at, updated_at) VALUES('0001', 
																																								@fecha_insert, 
																																								@timestamps, 
																																								@timestamps);				
				SELECT @fecha_insert;
		ELSE
				#CREAR NUEVO				
				INSERT INTO folios_alumno(numero, folio, created_at, updated_at) VALUES('0001',
																																								@fecha_insert,
																																								@timestamps,
																																								@timestamps);				
				SELECT @fecha_insert;
		END IF;	
		
END;;
delimiter;;


call generarFolioEnFechaProcederu();





DELIMITER$$
CREATE FUNCTION `GENERAFOMULIO` ()
	RETURNS VARCHAR
BEGIN

		DECLARE folio_db VARCHAR(250);
		DECLARE sub_fecha_db VARCHAR(250);
		DECLARE fecha_act_sys VARCHAR(250);
		DECLARE numero_db VARCHAR(250);
		DECLARE timestamps VARCHAR(250);
		DECLARE fecha_insert VARCHAR(250);
		DECLARE folio_return VARCHAR(250);
		DECLARE return_ VARCHAR(250);
		
		
		SELECT folio INTO folio_db FROM folios_alumno ORDER BY id DESC LIMIT 1;
		SELECT SUBSTRING(folio_db, 1,2) INTO sub_fecha_db;	
		SELECT SUBSTRING(YEAR(NOW()),  3, 2) INTO fecha_act_sys;		
		SELECT LPAD(numero+1,'4','0') INTO numero_db FROM folios_alumno ORDER BY id DESC LIMIT 1;	
		SELECT NOW() INTO timestamps;	
		SELECT CONCAT(fecha_act_sys,'0001') INTO fecha_insert;
		
		
		#VERIFICAR FECHA Y NUMEROS 
		IF sub_fecha_db = fecha_act_sys  THEN 		
				 
				INSERT INTO folios_alumno(numero, folio, created_at, updated_at) VALUES(  numero_db, 
																																									CONCAT(sub_fecha_db,numero_db), 
																																									timestamps, 
																																									timestamps);
																																									
				SELECT CONCAT(sub_fecha_db,numero_db) INTO folio_return;	
				SET return_ = folio_return;
				RETURN return_;
				
				
		ELSEIF fecha_act_sys > sub_fecha_db THEN				
				INSERT INTO folios_alumno(numero, folio, created_at, updated_at) VALUES('0001', 
																																								fecha_insert, 
																																								timestamps, 
																																								timestamps);				
				SELECT fecha_insert INTO folio_return;
				SET return_ = folio_return;
				RETURN return_;
				
		ELSE
				#CREAR NUEVO				
				INSERT INTO folios_alumno(numero, folio, created_at, updated_at) VALUES('0001',
																																								fecha_insert,
																																								timestamps,
																																								timestamps);				
				SELECT fecha_insert INTO folio_return;
				SET return_ = folio_return;
				RETURN return_;
		END IF;	
		
END$$
*/

DROP FUNCTION IF EXISTS `generarFolioEnFechaActual`;

DELIMITER$$
CREATE FUNCTION `generarFolioEnFechaActual` ()
RETURNS VARCHAR(7)
DETERMINISTIC
BEGIN

DECLARE folio_db VARCHAR(250);
DECLARE sub_fecha_db VARCHAR(250);
DECLARE fecha_act_sys VARCHAR(250);
DECLARE numero_db VARCHAR(250);
DECLARE timestamps VARCHAR(250);
DECLARE fecha_insert VARCHAR(250);
DECLARE folio_return VARCHAR(250);
		
SELECT folio INTO folio_db FROM folios_alumno ORDER BY id DESC LIMIT 1;
SELECT SUBSTRING(folio_db, 1,2) INTO sub_fecha_db;	
SELECT SUBSTRING(YEAR(NOW()),  3, 2) INTO fecha_act_sys;		
SELECT LPAD(numero+1,'4','0') INTO numero_db FROM folios_alumno ORDER BY id DESC LIMIT 1;	
SELECT NOW() INTO timestamps;	
SELECT CONCAT(fecha_act_sys,'0001') INTO fecha_insert;
				
#VERIFICAR FECHA Y NUMEROS 
IF sub_fecha_db = fecha_act_sys  THEN 		
#SI LA FEHCA ACTUAL ES IGUAL AL DEL ULTIMO REGISTRO CONTINUAR CONTANDO				 
INSERT INTO folios_alumno(numero, folio, created_at, updated_at) VALUES(  numero_db, CONCAT(sub_fecha_db,numero_db), timestamps, timestamps);
SELECT CONCAT(sub_fecha_db,numero_db) INTO folio_return;	
RETURN folio_return;

ELSEIF fecha_act_sys > sub_fecha_db THEN				
#CREA NUEVO FOLIO CON FECHA ACTUAL
INSERT INTO folios_alumno(numero, folio, created_at, updated_at) VALUES('0001', fecha_insert, timestamps, timestamps);				
SELECT fecha_insert INTO folio_return;
RETURN folio_return;
				
ELSE
#CREAR NUEVO				
INSERT INTO folios_alumno(numero, folio, created_at, updated_at) VALUES('0001',fecha_insert,timestamps,timestamps);				
SELECT fecha_insert INTO folio_return;
RETURN folio_return;
END IF;	
		
END$$

SELECT generarFolioEnFechaActual();




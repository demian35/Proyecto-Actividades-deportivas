--Schema BdDeportivas estructura sql de la base de datos

--Creamos el schema de la abse de datos

CREATE SCHEMA IF NOT EXISTS `BdDeportivas` ;
USE `BdDeportivas` ;

-- DROP TABLE IF EXISTS `BdDeportivas`.`entrenadores` ;
--Sentencia que crea la tabla de entrenadores
CREATE TABLE IF NOT EXISTS `BdDeportivas`.`entrenadores` (
  `correoEntrenador` VARCHAR(60) NOT NULL,
  `nomEntrenador` VARCHAR(60) NOT NULL,
  `primerApellido` VARCHAR(60) NOT NULL,
  `segundoApellido` VARCHAR(60) NOT NULL,
  `telefono` BIGINT(10) NOT NULL,
  `celular` BIGINT(10) NOT NULL,
  `fechaAltaEnt` DATETIME NOT NULL,
  `fechaModEnt` DATETIME NULL,
  PRIMARY KEY (`correoEntrenador`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BdDeportivas`.`ct_torneos`
-- -----------------------------------------------------
--DROP TABLE IF EXISTS `BdDeportivas`.`ct_torneos` ;

CREATE TABLE IF NOT EXISTS `BdDeportivas`.`ct_torneos` (
  `idTorneo` SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `nomTorneo` VARCHAR(30) NOT NULL,
  `eslogan` VARCHAR(50) NOT NULL,
  `vigencia` CHAR(1) NULL,
  `fechaAltaTor` DATETIME NOT NULL,
  `fechaModTor` DATETIME NULL,
  PRIMARY KEY (`idTorneo`))
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `BdDeportivas`.`ct_disciplinas`
-- -----------------------------------------------------
-- DROP TABLE IF EXISTS `BdDeportivas`.`ct_disciplinas` ;

CREATE TABLE IF NOT EXISTS `BdDeportivas`.`ct_disciplinas` (
  `idDisciplina` CHAR(5) NOT NULL,
  `nomDisciplina` VARCHAR(30) NOT NULL,
  `numMaxJugador` CHAR(2) NOT NULL,
  `numMinJugador` CHAR(2) NOT NULL,
  `cve_concepto_pago` CHAR(4) NULL,
  `fechaInicio` DATETIME NOT NULL,
  `fechaFin` DATETIME NOT NULL,
  `fechaAltaDisc` DATETIME NOT NULL,
  `fechaModDisc` DATETIME NULL,
  PRIMARY KEY (`idDisciplina`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BdDeportivas`.`ct_pruebas`
-- -----------------------------------------------------
-- DROP TABLE IF EXISTS `BdDeportivas`.`ct_pruebas` ;

CREATE TABLE IF NOT EXISTS `BdDeportivas`.`ct_pruebas` (
  `idPrueba` SMALLINT NOT NULL AUTO_INCREMENT,
  `nomPrueba` VARCHAR(30) NOT NULL,
  `fechaAltaPrue` DATETIME NOT NULL,
  `fechaModPrueba` DATETIME NULL,
  PRIMARY KEY (`idPrueba`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BdDeportivas`.`ct_categorias`
-- -----------------------------------------------------
-- DROP TABLE IF EXISTS `BdDeportivas`.`ct_categorias` ;

CREATE TABLE IF NOT EXISTS `BdDeportivas`.`ct_categorias` (
  `idCategoria` SMALLINT(6) NOT NULL AUTO_INCREMENT,
  `nomCategoria` VARCHAR(30) NOT NULL,
  `fechaAltaCaT` DATETIME NOT NULL,
  `fechaModCat` DATETIME NULL,
  PRIMARY KEY (`idCategoria`))
ENGINE = InnoDB;


-- Table `BdDeportivas`.`torneos_disciplinas`
-- -----------------------------------------------------
-- DROP TABLE IF EXISTS `BdDeportivas`.`torneos_disciplinas` ;

CREATE TABLE IF NOT EXISTS `BdDeportivas`.`torneos_disciplinas` (
  `idTorneoDisciplina` INT NOT NULL AUTO_INCREMENT,
  `idTorneo` SMALLINT NOT NULL,
  `idDisciplina` CHAR(5) NOT NULL,
  `idCategoria` SMALLINT NOT NULL,
  `idPrueba` SMALLINT NOT NULL,
  `rama` CHAR(1) NOT NULL,
  `fechaAltaTorDisc` DATETIME NOT NULL,
  `fechaModTorDisc` DATETIME NULL,
  PRIMARY KEY (`idTorneoDisciplina`),
  INDEX `idx_tor_dis_ct_tor_fk` (`idTorneo`),
  INDEX `idx_tor_dis_ct_disc_fk` (`idDisciplina`),
  INDEX `idx_tor_dis_ct_cat_fk` (`idCategoria`),
  INDEX `idx_tor_dis_ct_pru_fk` (`idPrueba`),
  CONSTRAINT `fk_ct_tor_tor`
    FOREIGN KEY (`idTorneo`)
    REFERENCES `BdDeportivas`.`ct_torneos` (`idTorneo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tor_dis_ct_dis`
    FOREIGN KEY (`idDisciplina`)
    REFERENCES `BdDeportivas`.`ct_disciplinas` (`idDisciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tor_dis_ct_cat_`
    FOREIGN KEY (`idCategoria`)
    REFERENCES `BdDeportivas`.`ct_categorias` (`idCategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tordis_ct_pru`
    FOREIGN KEY (`idPrueba`)
    REFERENCES `BdDeportivas`.`ct_pruebas` (`idPrueba`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BdDeportivas`.`inscripciones`
-- -----------------------------------------------------
-- DROP TABLE IF EXISTS `BdDeportivas`.`inscripciones` ;

CREATE TABLE IF NOT EXISTS `BdDeportivas`.`inscripciones` (
  `idInscripcion` INT NOT NULL AUTO_INCREMENT,
  `correoEntrenador` VARCHAR(60) NOT NULL,
  `idTorneoDisciplina` INT NOT NULL,
  `num_jugadores` SMALLINT NOT NULL,
  `ptl_ptl` CHAR(4) NOT NULL,
  `sede` VARCHAR(100) NULL,
  `idFolioPago` INT NOT NULL,
  `estatusInscripcion` CHAR(1) NULL,
  `fechaAltaInsc` DATETIME NOT NULL,
  `fechaModInsc` DATETIME NULL,
  PRIMARY KEY (`idInscripcion`),
  INDEX `idx_ins_ent_fk` (`correoEntrenador`),
  INDEX `idx_ins_dat_tor_fk` (`idTorneoDisciplina`),
  -- INDEX `idx_ins_plant_fk` (`ptl_ptl`),
  -- INDEX `idx_ins_fol_pag_fk` (`idFolioPago`),
  CONSTRAINT `fk_ins_ent`
    FOREIGN KEY (`correoEntrenador`)
    REFERENCES `BdDeportivas`.`entrenadores` (`correoEntrenador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ins_dat_tor`
    FOREIGN KEY (`idTorneoDisciplina`)
    REFERENCES `BdDeportivas`.`torneos_disciplinas` (`idTorneoDisciplina`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
 -- CONSTRAINT `fk_ins_plant`
 --   FOREIGN KEY (`ptl_ptl`)
 --   REFERENCES `BdDeportivas`.`dbo.planteles` (`ptl_ptl`)
 --   ON DELETE NO ACTION
 --   ON UPDATE NO ACTION,
 -- CONSTRAINT `fk_ins_fol_pag`
 --   FOREIGN KEY (`idFolioPago`)
 --   REFERENCES `BdDeportivas`.`folios_pago` (`idFolioPago`)
 --   ON DELETE NO ACTION
 --   ON UPDATE NO ACTION
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BdDeportivas`.`ct_estatusJugador`
-- -----------------------------------------------------
-- DROP TABLE IF EXISTS `BdDeportivas`.`ct_estatusJugador` ;

CREATE TABLE IF NOT EXISTS `BdDeportivas`.`ct_estatusJugador` (
  `idEstatusJugador` SMALLINT NOT NULL AUTO_INCREMENT,
  `estatusJugador` VARCHAR(50) NULL,
  `fechaAltaEstJug` DATETIME NOT NULL,
  `fechaModEstJug` DATETIME NULL,
  PRIMARY KEY (`idEstatusJugador`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BdDeportivas`.`jugadores`
-- -----------------------------------------------------
-- DROP TABLE IF EXISTS `BdDeportivas`.`jugadores` ;

CREATE TABLE IF NOT EXISTS `BdDeportivas`.`jugadores` (
  `idJugador` INT NOT NULL AUTO_INCREMENT,
  `idInscripcion` INT NOT NULL,
  `a_exp` CHAR(9) NOT NULL,
  `idEstatusJugador` SMALLINT NOT NULL,
  `fechaAltaJug` DATETIME NOT NULL,
  `fechaModJug` DATETIME NULL,
  PRIMARY KEY (`idJugador`),
  INDEX `idx_jug_ins_fk` (`idInscripcion`),
  -- INDEX `idx_jug_alum_fk` (`a_exp`),
  INDEX `idx_jug_est_jug_fk` (`idEstatusJugador`),
  CONSTRAINT `fk_jug_ins`
    FOREIGN KEY (`idInscripcion`)
    REFERENCES `BdDeportivas`.`inscripciones` (`idInscripcion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  -- CONSTRAINT `fk_jug_alum`
  --  FOREIGN KEY (`a_exp`)
  --  REFERENCES `BdDeportivas`.`dbo.alumnos` (`a_exp`)
  --  ON DELETE NO ACTION
  --  ON UPDATE NO ACTION,
  CONSTRAINT `fk_jug_est_jug`
    FOREIGN KEY (`idEstatusJugador`)
    REFERENCES `BdDeportivas`.`ct_estatusJugador` (`idEstatusJugador`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `BdDeportivas`.`dbo.planteles` (
  `ptl_ptl` CHAR(4) NOT NULL,
  `ptl_nombre` VARCHAR(60) NOT NULL,
  PRIMARY KEY (`ptl_ptl`)
)
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `BdDeportivas`.`folios_pago` (
  `folio_pago_id` int(10) NOT NULL AUTO_INCREMENT,
  `num_folio` varchar(10) NOT NULL,
  PRIMARY KEY (`folio_pago_id`)
) ENGINE=InnoDB 

 CREATE TABLE IF NOT EXISTS `BdDeportivas`.`dbo.alumnos` (
  `a_exp` CHAR(9) NOT NULL,
  `a_pat` VARCHAR(40) NULL,
  `a_mat` VARCHAR(40) NULL,
  `a_nom` VARCHAR(40) NULL,
  `a_curp` VARCHAR(18) NULL,
    PRIMARY KEY (`a_exp`)
) ENGINE=InnoDB 
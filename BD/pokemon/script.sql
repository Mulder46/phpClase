create database IF NOT EXISTS pokemon;
use pokemon;
CREATE TABLE IF NOT EXISTS  pokemon(
	id int auto_increment,
    nombre varchar(250),
    altura int,
    peso int,
    vida int,
    atras varchar(256),
    alante varchar(256),
    ataque int,
    defensa int,
    aEspecial int,
    dEspecial int,
    velocidad int,
    tipo1 varchar(256),
    tipo2 varchar(256),
    
    PRIMARY KEY(id)
    );
CREATE TABLE IF NOT EXISTS habilidades(
	id int auto_increment,
    nombre varchar(250),
    fk_pokemon int,
    
    PRIMARY KEY(id),
    FOREIGN KEY(fk_pokemon) REFERENCES pokemon(id)
    );
  -- drop table ataques;
  CREATE TABLE IF NOT EXISTS  ataques(
  id int auto_increment,
  fk_pokemon int,
  ataque varchar(250),
  fuerza int,
  pp int,
  probabilidad int,
  tipo varchar(256),
  nivelNecesario int,
  
  PRIMARY KEY(id),
  FOREIGN KEY(fk_pokemon) REFERENCES pokemon(id)
  );

	-- drop table usuarios;
    CREATE TABLE IF NOT EXISTS  usuarios(
      id int auto_increment,
      usuario VARCHAR(256),
      contrasenha VARCHAR(256),
      ganadas INT DEFAULT 0,
      
      PRIMARY KEY(id)
    );
  --  drop table mochila;
    CREATE TABLE IF NOT EXISTS  mochila(
      id int auto_increment,
      fk_pokemon int,
      fk_usuario int,
      nivel int,
      experiencia int,
      fecha DATE,
      
    PRIMARY KEY(id),
    FOREIGN KEY(fk_pokemon) REFERENCES pokemon(id),
    FOREIGN KEY(fk_usuario) REFERENCES usuarios(id)
    );
    
   -- drop table vencidos;
    CREATE TABLE IF NOT EXISTS  vencidos(
		id int auto_increment,
		fk_pokemon int,
		fk_usuario int,
        fecha DATE,
        
		PRIMARY KEY(id),
        FOREIGN KEY(fk_pokemon) REFERENCES pokemon(id),
		FOREIGN KEY(fk_usuario) REFERENCES usuarios(id)
    );
    
    
	CREATE TABLE IF NOT EXISTS  log(
		id int auto_increment,
		nombre VARCHAR(256),
        fecha DATE,
        conseguido TINYINT,
        ip VARCHAR(25),
        
		PRIMARY KEY(id)
    );
INSERT INTO CATEGORIA(CATEGORIA_nID,CATEGORIA_cDESC,CATEGORIA_cSTATUS,CATEGORIA_nCODPAI) VALUES
(1,'Amarola','Ativo',NULL),
(2,"Bela recatada e do lar",Ativo,NULL),
(3,"Series","Ativo",NULL),
(4,"Nerd","Ativo",NULL),
(5,"Believe","Ativo",NULL),
(6,"Favoritas","Ativo",NULL),
(7,"LA CASA DE PAPEL","ATIVO",3),
(8,"MR ROBOT","ATIVO",3),
(9,"FLASH","ATIVO",3),
(10,"ARROW","ATIVO",3),
(11,"Chá",'ATIVO',1),
(12,"Bela recata e do lar","ATIVO",2);

INSERT INTO PRODUTO(PRODUTO_nID,PRODUTO_cDESC,PRODUTO_cDESCCOMPLETA,PRODUTO_cSTATUS,PRODUTO_tsCRIACAO,PRODUTO_tMATERIAL) VALUES
(1,"Camisetas Temáticas","Produto exclusivo da nossa loja, com estampas temáticas. ",'ATIVO',"2018-06-28 15:21:46","Poliester com sublimação aplicada em prensa térmica retrocolátil a 100º"),
(2,"Camiseta Chá - Branca","Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ",'ATIVO',"2018-06-28 15:54:41",'Algodão'),
(3,"Camiseta Sea Smoke","Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ",'ATIVO',"2018-06-28 15:48:17",'Algodão'),
(4,"Camiseta Chá - Preto","Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ",'ATIVO',"2018-06-28 15:55:24",'Algodão'),
(5,"Camiseta Bitch - Preta","Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ",'ATIVO',"2018-06-28 16:00:37",'Algodão'),
(6,"Camiseta Compare - Branca","Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ",'ATIVO',"2018-06-28 16:02:35",'Algodão'),
(7,"Camiseta Fight - Preta","Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ",'ATIVO',"2018-06-28 16:03:08",'Algodão'),
(8,"Camiseta Mybody - Branca","Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ",'ATIVO',"2018-06-28 16:03:49",'Algodão'),
(9,"Camiseta Power Girl - Branca","Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ",'ATIVO',"2018-06-28 16:04:54",'Algodão'),
(10,"Camista Satan - Preta","Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ",'ATIVO',"2018-06-28 16:06:51",'Algodão'),
(11,"Camiseta Fight - Branca","Camiseta em malha 100% algodão fio penteado 30/1 muito confortável e resistente.
Estampa em vinil, que garante maior nitidez e durabilidade. O acabamento e a estamparia passam por um minucioso controle de qualidade. ",'ATIVO',"2018-06-28 16:07:27",'Algodão');

INSERT INTO PRODUTO_CATEGORIA(PRODUTO_CATEGORIA_nID,CATEGORIA_nID,PRODUTO_nID) VALUES
(1,1,1),
(2,2,1),
(8,1,3),
(9,11,3),
(10,1,2),
(11,11,2),
(12,1,4),
(13,11,4),
(15,2,5),
(16,12,5),
(17,2,6),
(18,12,6),
(19,2,7),
(20,12,7),
(21,2,8),
(22,12,8),
(25,2,9),
(26,12,9),
(27,2,10),
(28,12,10),
(29,2,11),
(30,12,11);

INSERT INTO MODELO (MODELO_nID,MODELO_cNOME,MODELO_nVLR_VENDA,MODELO_nSTATUS,MODELO_nDESCONTO,MODELO_nQTD_ESTOQUE,MODELO_tsCRIACAO,COR_nID,TAMANHO_nID,PRODUTO_nID) VALUES
(1,"Camiseta Unicórnio",109.00,"Ativo",NULL,10,"2018-06-28 15:21:46",3,1,1),
(2,"Camiseta Mermaids",109.00,"Ativo",NULL,10,"2018-06-28 15:21:46",2,2,1),
(3,"Camiseta Chá",45.00,"Ativo",0.00,10,"2018-06-28 15:38:01",5,2,2),
(4,"Camiseta Chá",45.00,"Ativo",0.00,10,"2018-06-28 15:55:54",5,3,2),
(5,"Camiseta Chá",45.00,"Ativo",0.00,10,"2018-06-28 15:56:02",5,4,2),
(6,"Camiseta Chá",45.00,"Ativo",0.00,10,"2018-06-28 15:56:28",4,2,4),
(7,"Camiseta Chá",45.00,"Ativo",0.00,10,"2018-06-28 15:56:09",4,3,4),
(8,"Camiseta Chá",45.00,"Ativo",0.00,10,"2018-06-28 15:56:17",4,4,4),
(9,"Camiseta Sea Smoke",45.00,"Ativo",0.00,10,"2018-06-28 15:49:00",4,2,3),
(10,"Camiseta Bitch - Preta",45.00,"Ativo",0.00,10,"2018-06-28 16:09:59",4,2,5),
(11,"Camiseta Compare - Branca",45.00,"Ativo",0.00,10,"2018-06-28 16:15:05",5,2,6),
(12,"Camiseta Fight - Preta",45.00,"Ativo",0.00,10,"2018-06-28 16:15:59",4,3,7),
(13,"Camiseta Mybody - Branca",45.00,"Ativo",0.00,10,"2018-06-28 16:19:06",5,3,8),
(14,"Camiseta Power Girl - Branca",45.00,"Ativo",0.00,10,"2018-06-28 16:23:49",5,3,9),
(15,"Camiseta Satan - Preta",45.00,"Ativo",0.00,10,"2018-06-28 16:36:11",4,3,10),
(16,"Camiseta Fight - Branca ",45.00,"Ativo",0.00,10,"2018-06-28 16:38:07",5,3,11);


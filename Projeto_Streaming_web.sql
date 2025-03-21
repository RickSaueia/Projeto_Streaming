create database Projeto_Streaming_web

use Projeto_Streaming_web


create table usuarios(
id_usuario int identity(1,1) primary key ,
nome varchar(64)not null,
email varchar(64)not null,
senha varchar(64)not null,
cpf varchar(14)not null,
plano_assinatura varchar(64)check(plano_assinatura in('Gratuito','Premium'))
);

create table cartao(
id_cartão int primary key identity(1,1),
nome_cartão varchar(64) not null,
numero_cartão varchar(64) not null,
validade varchar(64) not null,
cvc int not null
);


create table pagamentos(
id_pagamento int primary key identity(1,1),
valor decimal(8,2) not null,
forma_pagamento varchar(64)check(forma_pagamento in('PayPal','Pix','Débito','Crédito')),
status_pagamento varchar(64)check(status_pagamento in ('Completo','Pendente','Falhado')),
id_usuario int not null,
constraint fk_usuario foreign key(id_usuario)references usuarios(id_usuario)
);

create table conteudos(
id_conteudo int primary key identity(1,1),
titulo varchar(151)not null,
genero varchar(64)not null,
data_lancamento date,
descricao varchar(500)not null,
duracao time not null,
fachetaria varchar(64)not null,
img_url varchar(300)not null
);

create table interacoes(
id_interacoes int primary key identity(1,1),
avaliacoes varchar(64)check(avaliacoes in ('Like','Deslike','Nao')),
id_usuario int not null,
id_conteudo int not null,
constraint fk_conteudo foreign key (id_conteudo) references conteudos(id_conteudo),
constraint fk_usuarioss foreign key (id_usuario)references usuarios(id_usuario)
);

--sp_help	interacoes

--drop table usuarios
--drop table cartao
--drop table pagamentos
--drop table conteudos
--drop table interacoes

update usuarios set plano_assinatura = 'Premium' where id_usuario = '1'

select * from usuarios
select * from cartao
select * from pagamentos
select * from conteudos
 



--delete from interacoes where avaliacoes = 'Like'
--delete from interacoes


delete from interacoes where id_usuario = id_usuario and id_conteudo = id_conteudo

insert into usuarios(nome,email,senha,cpf,plano_assinatura)
values	('Osvaldo','Osvaldo@1.com','123','240.654.123-32','Gratuito');

select count(*) from usuarios where plano_assinatura = 'Premium' 

select * from usuarios where email = 'Nicolas@.com' and senha = '123'

insert into interacoes(avaliacoes,id_usuario)values
('Like',1)

select count(*) from interacoes where avaliacoes = 'Like'

insert into conteudos(titulo,genero,data_lancamento,descricao,duracao,fachetaria)values
('Batman','Ação','20/03/2013','Bom','2:50:00','18')

select count(*) from interacoes where avaliacoes = 'Like' and id_usuario = 1

insert into interacoes(id_interacoes,avaliacoes,id_usuario,id_conteudo)
values(1,'Like',1,1)


update interacoes set avaliacoes = 'Deslike' where id_usuario = '2' 

select count(*) from interacoes where avaliacoes = 'Like'


delete from conteudos where id_conteudo = '61';

--select nome,cargo from empregados where cargo like '%ger%'

select titulo from conteudos where titulo Like '%b%'
select titulo from conteudos where titulo Like '%ba%'
select titulo from conteudos where titulo Like '%bat%'
select titulo from conteudos where titulo Like '%batm%'
select titulo from conteudos where titulo Like '%batma%'
select titulo from conteudos where titulo Like '%batman%'
select titulo from conteudos where titulo Like '%s%'


INSERT INTO conteudos (titulo, genero, data_lancamento, descricao, duracao,fachetaria, img_url)
VALUES
('Blood-C', 'Ação', '2011-07-02', 'Estudante luta contra monstros enquanto descobre segredos sobre sua existência.', '00:24:00', '18', 'blood_c.jpg'),
('Fullmetal Alchemist: Brotherhood', 'Ação', '2009-04-05', 'Dois irmãos buscam restaurar seus corpos após experimento falho com alquimia.', '00:24:00', '14', 'fullmetal_alchemist_brotherhood.jpg'),
('Hunter x Hunter', 'Ação', '2011-10-02', 'Gon busca seu pai desaparecido enquanto enfrenta inimigos poderosos.', '00:24:00', '12', 'hunter_x_hunter.jpg'),
('Jujutsu Kaisen', 'Ação', '2020-10-03', 'Yuji luta contra uma entidade maligna após ingerir um dedo amaldiçoado.', '00:24:00', '16', 'jujutsu_kaisen.jpg'),
('Naruto', 'Ação', '2002-10-03', 'Naruto luta para se tornar o Hokage superando desafios e preconceitos.', '00:24:00', '12', 'naruto.jpg'),
('Naruto Shippuden', 'Ação', '2007-02-15', 'Naruto retorna à vila e enfrenta organizações criminosas com amigos.', '00:24:00', '14', 'naruto_shippuden.jpg'),
('Solo Leveling', 'Ação', '2021-03-03', 'Sung Jinwoo se torna mais forte após receber habilidades misteriosas.', '00:24:00', '16', 'solo_leveling.jpg'),
('Soul Eater', 'Ação', '2008-04-07', 'Alunos treinam para combater espíritos malignos e salvar a cidade.', '00:24:00', '14', 'soul_eater.jpg'),
('Yu Yu Hakusho', 'Ação', '1992-10-10', 'Yusuke, um delinquente, vira detetive do mundo espiritual após sua morte.', '00:24:00', '12', 'yuyu_hakusho.jpg'),
('Ao no Exorcist', 'Aventura', '2011-04-17', 'Rin, filho de Satanás, se torna exorcista para lutar contra demônios.', '00:24:00', '16', 'ao_no_exorcist.jpg'),
('Attack on Titan', 'Aventura', '2013-04-06', 'Eren e seus amigos enfrentam gigantes humanos para salvar a humanidade.', '00:24:00', '16', 'attack_on_titan.jpg'),
('Cowboy Bebop', 'Aventura', '1998-04-03', 'Caçadores de recompensas viajam pelo espaço lidando com casos e com seus passados.', '00:24:00', '14', 'cowboy_bebop.jpg'),
('Durarara!!', 'Aventura', '2010-01-08', 'Pessoas com habilidades extraordinárias se entrelaçam em Ikebukuro.', '00:24:00', '14', 'durarara!!.jpg'),
('Hellsing Ultimate', 'Aventura', '2006-02-10', 'Alucard, um vampiro, combate criaturas sobrenaturais para proteger a Inglaterra.', '00:24:00', '18', 'hellsing_ultimate.jpg'),
('InuYasha', 'Aventura', '2000-10-16', 'Kagome viaja ao Japão feudal e encontra InuYasha, com quem busca a Shikon no Tama.', '00:24:00', '12', 'inuyasha.jpg'),
('JoJos Bizarre Adventure', 'Aventura', '2012-10-05', 'A família Joestar enfrenta vilões com habilidades sobrenaturais ao longo de gerações.', '00:24:00', '16', 'jojos_bizarre_adventure.jpg'),
('No.6', 'Aventura', '2011-07-09', 'Shion e Nezumi tentam desvendar os segredos de uma cidade futurista e corrupta.', '00:24:00', '16', 'no6.jpg'),
('Asobi Asobase', 'Comédia', '2018-07-08', 'Três meninas do ensino médio têm experiências engraçadas e absurdas no clube de jogos.', '00:24:00', '12', 'asobi_asobase.jpg'),
('Danshi Koukousei no Nichijou', 'Comédia', '2012-01-09', 'Situações cotidianas e absurdas de três estudantes do ensino médio.', '00:24:00', '12', 'Danshi_Koukousei_no_Nichijou.jpg'),
('Detroit Metal City', 'Comédia', '2008-07-08', 'Soichi leva uma vida dupla como líder de uma banda de metal e músico pop.', '00:24:00', '16', 'detroit_metal_city.jpg'),
('Gintama', 'Comédia', '2006-04-04', 'Gintoki e seus amigos enfrentam perigos com humor e de maneira desleixada.', '00:24:00', '14', 'gintama.jpg'),
('Golden Boy', 'Comédia', '1995-03-03', 'Kintaro viaja pelo Japão para aprender novas experiências e lições de vida.', '00:24:00', '14', 'golden_boy.jpg'),
('One Punch Man', 'Comédia', '2015-10-05', 'Saitama derrota qualquer inimigo com um único soco e busca adversários desafiadores.', '00:24:00', '12', 'one_punch_man.jpg'),
('Saint Young Men', 'Comédia', '2018-04-06', 'Jesus Cristo e Buda vivem juntos em Tóquio, tentando entender a vida moderna.', '00:24:00', '14', 'Saint_Young_Men.jpg'),
('Spy x Family', 'Comédia', '2022-04-09', 'Um espião cria uma família falsa, com sua esposa sendo uma assassina e filha uma telepata.', '00:24:00', '12', 'spy_x_family.jpg'),
('A Silent Voice', 'Romance', '2016-09-17', 'Shoya busca se redimir com Shoko, a colega surda que zombou no passado.', '00:24:00', '12', 'a_silent_voice.jpg'),
('Amnesia', 'Romance', '2011-08-27', 'Uma jovem perde a memória e é cortejada por homens com personalidades distintas.', '00:24:00', '14', 'amnesia.jpg'),
('Hotarubi no Mori e', 'Romance', '2011-09-17', 'Hotaru se apaixona por Gin, um espírito imortal com quem não pode ter contato físico.', '00:24:00', '12', 'hotarubi_no_mori_e.jpg'),
('Kokoro Connect', 'Romance', '2012-07-07', 'Amigos do ensino médio trocam de corpos e enfrentam dilemas emocionais e sentimentais.', '00:24:00', '14', 'kokoro_connect.jpg'),
('Ponyo', 'Romance', '2008-07-19', 'Ponyo, uma menina peixe, deseja viver na terra e transforma a vida de Sosuke.', '00:24:00', '6', 'ponyo.jpg'),
('Say I Love You', 'Romance', '2012-10-06', 'Mei, uma garota solitária, aprende a confiar nas pessoas com a ajuda de Yamato.', '00:24:00', '12', 'say_i_love_you.jpg'),
('Vampire Knight', 'Romance', '2008-04-08', 'Yūuki, uma jovem, vive em uma escola dividida entre humanos e vampiros, lidando com seu triângulo amoroso.', '00:24:00', '14', 'vampire_knight.jpg'),
('Your Name', 'Romance', '2016-08-26', 'Taki e Mitsuha trocam de corpos e tentam entender sua conexão misteriosa.', '00:24:00', '12', 'your_name.jpg'),
('Another', 'Suspense', '2012-01-09', 'Kouichi chega a uma escola com uma maldição sombria que leva à morte dos alunos.', '00:24:00', '16', 'another.jpg'),
('Bakemonogatari', 'Suspense', '2009-07-03', 'Koyomi ajuda várias figuras sobrenaturais enquanto enfrenta seus próprios dilemas.', '00:24:00', '14', 'bakemonogatari.jpg'),
('Ergo Proxy', 'Suspense', '2006-02-25', 'Re-L investiga o desaparecimento de humanos em um futuro pós-apocalíptico.', '00:24:00', '16', 'ergo_Proxy.jpg'),
('Made in Abyss', 'Suspense', '2017-07-07', 'Riko desce no Abismo para explorar mistérios com Reg, um robô misterioso.', '00:24:00', '16', 'made_in_abyss.jpg'),
('Monster', 'Suspense', '2004-04-07', 'Dr. Kenzo salva Johan, um garoto que se revela um assassino em série.', '00:24:00', '16', 'monster.jpg'),
('Neon Genesis Evangelion', 'Suspense', '1995-10-05', 'Shinji pilota um robô gigante para combater seres alienígenas enquanto enfrenta dilemas psicológicos.', '00:24:00', '16', 'neon_genesis_evangelion.jpg'),
('Paradise Kiss', 'Suspense', '2005-10-13', 'Yukari é recrutada por fashionistas para ser modelo e se envolve em dilema romântico e de carreira.', '00:24:00', '16', 'paradise_kiss.jpg'),
('Perfect Blue', 'Suspense', '1997-02-28', 'Mima sofre com alucinações enquanto é perseguida por um fã obsessivo.', '00:24:00', '18', 'perfect_blue.jpg');


INSERT INTO conteudos (titulo, genero, data_lancamento, descricao, duracao, fachetaria, img_url)  
VALUES  
('Black Butler', 'Drama', '2008-10-02', 'Ciel Phantomhive faz um pacto com o demônio Sebastian para vingar seus pais.', '00:24:00', '16+', 'black_butler.jpg'),  
('Code Geass', 'Drama', '2006-10-05', 'Lelouch ganha o poder do Geass e luta contra o império opressor.', '00:24:00', '16+', 'code_geass.jpg'),  
('Katanagatari', 'Drama', '2010-01-25', 'Shichika e Togame buscam 12 espadas lendárias em uma jornada filosófica.', '00:50:00', '14+', 'Katanagatari.jpg'),  
('Kuzu no Honkai', 'Drama', '2017-01-12', 'Hanabi e Mugi vivem um romance complicado e cheio de paixões não correspondidas.', '00:23:00', '18+', 'kuzu_no_honkai.jpg'),  
('Noragami', 'Drama', '2014-01-05', 'Yato, um deus menor, busca reconhecimento ajudando humanos e espíritos.', '00:24:00', '14+', 'Noragami.jpg'),  
('Shiki', 'Drama', '2010-07-08', 'Uma vila enfrenta a ameaça dos Shiki, seres vampíricos que espalham terror.', '00:22:00', '16+', 'Shiki.jpg'),  
('Toradora!', 'Drama', '2008-10-02', 'Ryuuji e Taiga se ajudam romanticamente em uma história de amor e amizade.', '00:24:00', '12+', 'Toradora!.jpg'),  
('Wotakoi: Love is Hard for Otaku', 'Drama', '2018-04-13', 'Narumi e Hirotaka exploram um relacionamento entre otakus.', '00:22:00', '14+', 'Wotakoi_Love_is_Hard_for_Otaku.jpg'),  

('Akame ga Kill!', 'Fantasia', '2014-07-07', 'Tatsumi se junta ao Night Raid para lutar contra a corrupção.', '00:24:00', '16+', 'akame_ga_kill.jpg'),  
('Beastars', 'Fantasia', '2019-10-10', 'Legoshi, um lobo, lida com sua natureza e seu amor por Haru, uma coelha.', '00:23:00', '16+', 'Beastars.jpg'),  
('Black Rock Shooter', 'Fantasia', '2012-02-03', 'Mato Kuroi e sua versão alternativa lutam em um mundo paralelo.', '00:25:00', '14+', 'black_rock_shooter.jpg'),  
('Bleach', 'Fantasia', '2004-10-05', 'Ichigo Kurosaki se torna um Shinigami e enfrenta espíritos malignos.', '00:24:00', '14+', 'Bleach.jpg'),  
('Death Parade', 'Fantasia', '2015-01-09', 'Almas são julgadas em um bar através de jogos psicológicos.', '00:23:00', '16+', 'death_parade.jpg'),  
('Overlord', 'Fantasia', '2015-07-07', 'Momonga fica preso em um MMORPG e decide dominar o novo mundo.', '00:24:00', '16+', 'overlord.jpg'),  
('Serial Experiments Lain', 'Fantasia', '1998-07-06', 'Lain explora os mistérios da rede digital The Wired.', '00:22:00', '16+', 'serial_experiments_lain.jpg'),  
('Trigun', 'Fantasia', '1998-04-01', 'Vash the Stampede é um atirador habilidoso que busca redenção.', '00:24:00', '14+', 'trigun.jpg');  


select * from conteudos where titulo = 'jojo'

update conteudos set titulo ='Fullmetal Alchemist Brotherhood' where id_conteudo = '2'

INSERT INTO conteudos (titulo, genero, data_lancamento, descricao, duracao, fachetaria, img_url)  
VALUES  
('Hora de Aventura', 'Desenho', '2010-04-05',  
 'Finn e Jake exploram o Mundo de Ooo, enfrentando monstros e vivendo aventuras mágicas.',  
 '00:11:00', '10 anos', 'a_hora_de_aventura.jpg'),  

('A Turma do Bairro', 'Desenho', '2002-12-06',  
 'Grupo de crianças vive aventuras e situações cômicas em um bairro cheio de desafios.',  
 '00:22:00', '8 anos', 'a_turma_do_bairro.jpg'),  

('Apenas um Show', 'Desenho', '2010-09-06',  
 'Rigby e Mordecai tentam se divertir enquanto trabalham em um parque, gerando caos e humor.',  
 '00:11:00', '10 anos', 'apenas_um_show.jpg'),  

('As Terríveis Aventuras de Billy e Mandy', 'Desenho', '2001-06-09',  
 'Billy e Mandy fazem amizade com Grim, o ceifador, e enfrentam situações bizarras e sombrias.',  
 '00:11:00', '10 anos', 'as_terriveis_aventuras_de_billy_e_mandy.jpg'),  

('Ben 10 (Clássico)', 'Desenho', '2005-12-27',  
 'Ben Tennyson usa o Omnitrix para se transformar em heróis alienígenas e combater vilões.',  
 '00:22:00', '8 anos', 'ben_10.jpg'),  

('O Laboratório de Dexter', 'Desenho', '1996-04-27',  
 'Dexter, um jovem gênio, tenta proteger seu laboratório das trapalhadas de sua irmã Dee Dee.',  
 '00:11:00', '8 anos', 'o_laboratorio_de_dexter.jpg'),  

('Os Padrinhos Mágicos', 'Desenho', '2001-03-30',  
 'Timmy tem padrinhos mágicos que realizam seus desejos, muitas vezes com consequências hilárias.',  
 '00:11:00', '8 anos', 'os_padrinhos_magicos.jpg'),  

('Scooby-Doo', 'Desenho', '1969-09-13',  
 'Scooby e a turma da Mistério S.A. resolvem mistérios, sempre desmascarando falsos monstros.',  
 '00:22:00', '8 anos', 'scooby_doo.jpg'),  

('Steven Universe', 'Desenho', '2013-11-04',  
 'Steven e as Gemas enfrentam desafios e descobrem segredos sobre seu passado e seus poderes.',  
 '00:11:00', '10 anos', 'steven_universe.jpg'),  

('Tom e Jerry', 'Desenho', '1940-02-10',  
 'As perseguições e travessuras clássicas entre Tom, o gato, e Jerry, o rato.',  
 '00:07:00', 'Livre', 'tom_e_jerry.jpg');  

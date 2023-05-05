-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 05 mai 2023 à 12:05
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `superweek`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `title`, `content`, `id_user`) VALUES
(5, 'Le Petit Prince', 'Un pilote d\'avion s\'écrase dans le désert du Sahara et rencontre un petit prince venu d\'une autre planète. Ensemble, ils découvrent les mystères de l\'univers et de la vie.', 6),
(1, 'Les Misérables', 'Dans une France du XIXe siècle, Jean Valjean est condamné à 19 ans de travaux forcés pour avoir volé du pain. Après sa libération, il change d\'identité et de vie pour échapper à son passé.', 2),
(2, 'Le Comte de Monte-Cristo', 'Edmond Dantès est emprisonné à tort au Château d\'If pour être remplacé par son rival. Après avoir rencontré l\'abbé Faria, il s\'échappe et trouve un trésor sur l\'île de Monte-Cristo. De retour à Paris, il se venge de ses ennemis.', 3),
(3, 'Orgueil et Préjugés', 'Dans l\'Angleterre du XVIIIe siècle, Elizabeth Bennet est la deuxième des cinq filles d\'une famille modeste. Lorsqu\'elle rencontre M. Darcy, elle est convaincue qu\'il est arrogant et orgueilleux, mais finit par découvrir qu\'il est en réalité un homme bienveillant.', 1),
(6, '1984', 'Dans un monde totalitaire, Winston Smith travaille pour le Parti et tombe amoureux de Julia. Mais leur amour est interdit et leur quête de liberté les mène à une fin tragique.', 12),
(4, 'Guerre et paix', 'Dans la Russie du XIXe siècle, Pierre Bezoukhov et Natacha Rostova naviguent à travers les guerres napoléoniennes et les bouleversements sociaux de leur époque, tout en cherchant leur place dans le monde.', 5),
(9, 'Le Parfum', 'Jean-Baptiste Grenouille est un jeune homme né sans odeur. Il développe un don extraordinaire pour la création de parfums, mais pour cela, il doit tuer de jeunes femmes pour en extraire l\'essence de leur odeur.', 20),
(10, 'Les fourmis', 'Dans la forêt amazonienne, un entomologiste français découvre une civilisation de fourmis très organisée. Il se trouve alors entraîné dans une aventure incroyable qui remet en question sa vision du monde.', 17),
(11, 'Le Seigneur des Anneaux', 'Dans un monde fantastique, Frodon Sacquet se lance dans une quête pour détruire l\'Anneau de Puissance et vaincre le Seigneur des Ténèbres, Sauron. Il est aidé par une communauté d\'alliés, chacun avec ses propres pouvoirs et faiblesses.', 9),
(12, 'La métamorphose', 'Gregor Samsa se réveille un jour transformé en un insecte géant. Sa famille, horrifiée, le rejette peu à peu jusqu\'à ce qu\'il meure seul et abandonné.', 15),
(13, 'l\'Alchimiste', 'L\'Alchimiste est un roman qui raconte l\'histoire d\'un jeune berger nommé Santiago qui se lance dans un voyage pour trouver un trésor caché dans les pyramides égyptiennes. En chemin, il rencontre une série de personnages qui lui enseignent des leçons importantes sur la vie, y compris un alchimiste qui l\'aide à découvrir le vrai sens de son voyage. Le livre explore les thèmes de la destinée, de la légende personnelle et de l\'importance de suivre ses rêves. C\'est une histoire puissante et inspirante qui a captivé des lecteurs du monde entier.', 33),
(14, 'Le chant du rossignol', 'Deux sœurs françaises, Vianne et Isabelle, vivent sous l&#039;occupation allemande pendant la Seconde Guerre mondiale. Vianne est une femme mariée et mère d&#039;une petite fille, qui doit faire face à l&#039;occupation allemande en essayant de maintenir sa famille et sa communauté en sécurité. Isabelle, quant à elle, est une jeune femme rebelle qui rejoint la Résistance et participe à la lutte contre les forces d&#039;occupation. Malgré leur différence, les deux sœurs sont unies par leur amour et leur soutien mutuel, ainsi que par leur quête de liberté, de dignité et de survie dans un monde déchiré par la guerre. Le roman explore les thèmes de l&#039;amour, de la famille, de la résilience, de la trahison et de la survie dans des temps difficiles, et offre un portrait émouvant et réaliste de la vie sous l&#039;occupation nazie en France.', 33);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=114 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `first_name`, `last_name`, `password`) VALUES
(1, 'roxane.adams@hotmail.com', 'Roxane', 'Adams', '$2y$10$EtSWM/oA/gilLo2utcT9Wu8XkrNRTkxpL/PVyhndhD6M5BAh0B1A6'),
(2, 'ally.kunze@gmail.com', 'Ally', 'Kunze', '$2y$10$wEe12/XRqwc0lRrB1EsRP.g3Mn4q3b5kSNXvUtiOtBHGWnk6JbUa.'),
(3, 'dario.wilkinson@gmail.com', 'Dario', 'Wilkinson', '$2y$10$V04kTunerZMQKdN7UluzC.JOxKv1.yd2tOBjF7WALiFDdoEgA3MUa'),
(4, 'conor.abshire@yahoo.com', 'Conor', 'Abshire', '$2y$10$AiUYlxtSkT5tgpBSI50aN.gUmxm679QsmdHeMxbb/2CUDf.93PLHC'),
(5, 'kiara.swift@hotmail.com', 'Kiara', 'Swift', '$2y$10$NDAx3CPKBgImVbcuOAcU5OTtn3lbaJCkyxfJpeUcoF.N3qjLwfMjS'),
(6, 'eusebio.ondricka@hotmail.com', 'Eusebio', 'Ondricka', '$2y$10$g4iuhILejtNQlCtAZjmCf.DuESvp0SQ5qDTu0xhz8Cg/L2NxBxZGi'),
(7, 'alex.grady@gmail.com', 'Alex', 'Grady', '$2y$10$tH26pPqihVdc.nxqRfj5yee1mMFnOgnu28wbNI51k.VEg1EZr1ijm'),
(8, 'ariel.robel@hotmail.com', 'Ariel', 'Robel', '$2y$10$U/rjhRxKO0u4QFdmH0vqseHAvZubceCWiQhMSpNKvoqzpWnwzx9Oi'),
(9, 'laverne.eichmann@gmail.com', 'Laverne', 'Eichmann', '$2y$10$wOLnbnnj7xtWh.X/dxGSp.OyLOiG1ugQ.NaNIiCRUq52uHB/5qMTW'),
(10, 'bradly.heaney@hotmail.com', 'Bradly', 'Heaney', '$2y$10$8z2c1ZPWVH.ppw7zrdbPeeDLQ3pVb.EpSJ3Bfvs3R4rWktALdm2be'),
(11, 'lilly.greenholt@gmail.com', 'Lilly', 'Greenholt', '$2y$10$D2R2uEOKm5G7cUml2V0XYOTJwmYzILBFsSimIGXtaOhD/j6iib6bG'),
(12, 'brayan.mckenzie@gmail.com', 'Brayan', 'McKenzie', '$2y$10$yqtrk9nRBocKc6JtOtnKgupaaCcZEvA6jt1dTESRE6KLpyz4VDWVq'),
(13, 'laurie.mueller@gmail.com', 'Laurie', 'Mueller', '$2y$10$ClU.QVzzYVeCVZO0C2OWRekRy4bc6G2p3AvaIzKnY7ClLIc4JBvl.'),
(14, 'mireya.white@yahoo.com', 'Mireya', 'White', '$2y$10$gUeNiG3qCoo9ywDf.Yg3mOZpGC2oJVZu1NfHhb7pVZPc76/J1yMCm'),
(15, 'jay.lemke@gmail.com', 'Jay', 'Lemke', '$2y$10$Gz1JvwI0OgehpwY2EObn9uDhs7Tz5zxkgms82wfPYuOnO5YGDxxnK'),
(16, 'obie.willms@hotmail.com', 'Obie', 'Willms', '$2y$10$pull.uSYJyALl1XwOwZrjuc0cuC.6EMfDXB6LUEDB4w71WunBX/Tq'),
(17, 'reba.rosenbaum@yahoo.com', 'Reba', 'Rosenbaum', '$2y$10$iQ1/cLxkd7kRZu0eopM10.ijz73U8jTbguXJCDMNvpfpkSTdSfl6e'),
(18, 'orland.trantow@hotmail.com', 'Orland', 'Trantow', '$2y$10$M2sqwcqsXi4UKzKE9WeFwOydHztTJFeMba/IBtpvadVEms5rjZtDO'),
(19, 'bobby.rippin@yahoo.com', 'Bobby', 'Rippin', '$2y$10$Sprmb7vdp9j.hfF4/NyG3e.eURGkDO4VesOn.LTj7HN3Z2/tx.k5a'),
(20, 'jade.tremblay@yahoo.com', 'Jade', 'Tremblay', '$2y$10$DwUeiG7G.6YdltgpTd0DXuxTssdRhoUUPUeHfQoSYRLETsdnjsBim'),
(33, 'admin@admin.fr', 'admin', 'admin', '$2y$10$n6uSYEJ9rYkv5ot.RcGBJO8OpZWTJzSZ4nVElHb9mk7SMMETWTkTW'),
(34, 'gilda.murphy@yahoo.com', 'Gilda', 'Murphy', '$2y$10$TcoDGCvpTe49WR3PcVkHGeumFYJz0lTZf6.6PtbNEDaL6mDNbMtCe'),
(35, 'mason.altenwerth@hotmail.com', 'Mason', 'Altenwerth', '$2y$10$KAzaUXIGl4MndJxdSy1.IemiUkilQiQhn7xqRTO/ckSHxdxZMLTNK'),
(36, 'khalil.kunde@gmail.com', 'Khalil', 'Kunde', '$2y$10$wYBEyZS6DxQZXiAat2gVWejjo0F/D5f/4jMvcdLVjEJPGghBw4zVG'),
(37, 'aisha.tromp@gmail.com', 'Aisha', 'Tromp', '$2y$10$uKAheJUOvK6qOYXgfGyeI.qyk2FpKwdocGn8h5IrYyHL1vtVWAxBC'),
(38, 'hadley.cummings@yahoo.com', 'Hadley', 'Cummings', '$2y$10$4T/gEe1tM7qSqhtG5RxxteFCxE2awBAQOE.TGYxiehUuptQNgahgK'),
(39, 'dorris.aufderhar@hotmail.com', 'Dorris', 'Aufderhar', '$2y$10$VlTe5jmVzVNCsx40fzdBMO8upa/EUX8M4j1/QLdkW161NIjtlqHLi'),
(40, 'beryl.kovacek@gmail.com', 'Beryl', 'Kovacek', '$2y$10$2hcA9vTdR.lp63Dkj.KFb.KXV7eltzG1X3MgFxHLzey7vma/T2DP2'),
(41, 'dedric.larkin@gmail.com', 'Dedric', 'Larkin', '$2y$10$nJHpXW8XeA/6ir8IFBfAD.ejN8L2uI.iSWB4aS12pZsRSbwaP3R1C'),
(42, 'garrick.haag@yahoo.com', 'Garrick', 'Haag', '$2y$10$xk2653b7nf5EnAqtyDd92OOrmt/.Yif0cLMvd3o2XQrm4QUS4ACa2'),
(43, 'shany.dach@hotmail.com', 'Shany', 'Dach', '$2y$10$p3bbkEP5K.mqFO1oTSg91.Z9he4cO2bi5W8bW6V5cg1hbjenTeFHG'),
(44, 'agustina.daniel@gmail.com', 'Agustina', 'Daniel', '$2y$10$XvlQMuulXnVhkTR0MSC9Z.uwtyiTjbWZmawmjhknxqrM4.b7j/xWW'),
(45, 'kaden.ondricka@hotmail.com', 'Kaden', 'Ondricka', '$2y$10$m3WX6FS785Dgi4yrlMk38.pwXKK/Qk6Iwn/LgW3zQKVvfcj1fm62q'),
(46, 'nelda.hamill@yahoo.com', 'Nelda', 'Hamill', '$2y$10$W8hbPD3/KRbmIElpF42BJeRYO/Cb88Z4JYx8NtikVkk/KyTTqLWxu'),
(47, 'jesus.satterfield@hotmail.com', 'Jesus', 'Satterfield', '$2y$10$VH3wNwwEPnIoEziwtInlYebMVt7/xgI7i0l7hVBd9RCcLW1VzrmGW'),
(48, 'emely.rau@yahoo.com', 'Emely', 'Rau', '$2y$10$AH34MOJLhDJ5/.AB8lAp.eseNOY2OL.0yfpe0vjO/PQwhcRGj/T4q'),
(49, 'domingo.labadie@hotmail.com', 'Domingo', 'Labadie', '$2y$10$8YY8MykEmOVuwqMDMy65bepI4jXU4/LjblhcCRLhyzRuivSdiXRGm'),
(50, 'bernadine.jerde@hotmail.com', 'Bernadine', 'Jerde', '$2y$10$wlGg9xiyjQJEsD3U6V6YJeOkcPoua2RGqFbYDlr2Bc010YbAWaf6.'),
(51, 'kyra.eichmann@gmail.com', 'Kyra', 'Eichmann', '$2y$10$/J4dQOHHw2GwFrC12nDv8Oy30WJcLdnrs2dJT2mn38ZL1IdDK33CS'),
(52, 'maximillia.kris@yahoo.com', 'Maximillia', 'Kris', '$2y$10$wP64tGZqgUEsFLvS34qZW.inMlOTgQPrvnIuhleSzMwMQodvQxdLS'),
(53, 'nash.kling@yahoo.com', 'Nash', 'Kling', '$2y$10$5ZFNZ.DAdTs9dJIok2i6jeSXQeEZwt031nkNFv.O/K0A6rrGjrSbW'),
(54, 'therese.shields@hotmail.com', 'Therese', 'Shields', '$2y$10$uEBCdB7LR6SHnSHPFjU9vOE26wDmLzrG7wnYzYu5jXeAzn8J20OJC'),
(55, 'ian.hegmann@gmail.com', 'Ian', 'Hegmann', '$2y$10$VheeRDwOhovK6IhHl0mHSOTjTL/dPyfqm5jMpz401.BLnr2nu9nJ.'),
(56, 'moriah.pfannerstill@yahoo.com', 'Moriah', 'Pfannerstill', '$2y$10$LDfn.hdzCBPtjVc.tS0OkezY..T9qadvCnUMscAflZMs.BaDcKDJe'),
(57, 'bessie.wilderman@yahoo.com', 'Bessie', 'Wilderman', '$2y$10$DGSMEL1gSVm94My7OOAwZODNd6Wa9iBUZkVIPcA1hT4hVb.JgYvEq'),
(58, 'abelardo.dach@yahoo.com', 'Abelardo', 'Dach', '$2y$10$CgdRehRF7KVEaO8pX1bpk.IMSTNGRAJn0/m7tNAQ62qzzQ4aa6AOG'),
(59, 'major.dare@hotmail.com', 'Major', 'Dare', '$2y$10$Ncuem6lGZEDau0UmmP/77.vs4VtwfVENoXizOfdgNk3fuBNQUtVhe'),
(60, 'devin.hoeger@gmail.com', 'Devin', 'Hoeger', '$2y$10$89wgJ89oxcNUjrm8MNQ9juR4My.SlCUPKyuW.PQc1CPXrbYAXlMi.'),
(61, 'ocie.rohan@hotmail.com', 'Ocie', 'Rohan', '$2y$10$5DORA.oUTEH2fPWvpNu4.OKa2d7sPHxMMCKGIOM55lecRIMM.xu1m'),
(62, 'haylee.klein@yahoo.com', 'Haylee', 'Klein', '$2y$10$faUbmcfQb6d5xaHPHS4ttOBIl.6jV5TUUMpRniscC7CZnMQGin8ou'),
(63, 'julien.larson@gmail.com', 'Julien', 'Larson', '$2y$10$yY0odANv2uge1RSzosqw3.DaN0Q9mLD/sPC4vzyS0VI9DE.alU9Mq'),
(64, 'cole.koelpin@yahoo.com', 'Cole', 'Koelpin', '$2y$10$EWvhsz6atPsa3BJEP3RyluDVYmqU4NJDZTwrGyeG7IdJ84nKgx3QK'),
(65, 'margarete.morissette@hotmail.com', 'Margarete', 'Morissette', '$2y$10$H3k2y/KPdEIAW2JehJdicOIdfKT0swx7tOgoZQrpBK52Hpys2o0k2'),
(66, 'jameson.altenwerth@hotmail.com', 'Jameson', 'Altenwerth', '$2y$10$nK7bRPzQBe7uy2mPGdXHw.O2V22cjucIdl0YcwFqzOl7ribe5oCz6'),
(67, 'brendon.jacobs@yahoo.com', 'Brendon', 'Jacobs', '$2y$10$5e42fZq/hO8Ke7UtOCxcC.yPAc9FjgK4Qaz3ovvL2Pvx1KBMAC6E2'),
(68, 'jade.walsh@hotmail.com', 'Jade', 'Walsh', '$2y$10$NwYnW8i0vGztjZ/9VDwUzOcuwUXZtRoGi0I8LjyS8At8E/ptwOeN2'),
(69, 'jaren.bruen@hotmail.com', 'Jaren', 'Bruen', '$2y$10$88NbgsZ9XbSMrwdxZzeIuOyIXqDjrufNrXXGnTssTsdmExFcLvXTe'),
(70, 'lucas.volkman@gmail.com', 'Lucas', 'Volkman', '$2y$10$4YIguVIn0ku4MNycaVUYb.gQtUx/csJ23fJwUddDITK9wCdsHHYUG'),
(71, 'lorenz.jakubowski@gmail.com', 'Lorenz', 'Jakubowski', '$2y$10$vim/dL.G/IIJu5gHXCA/DOYGFHB3CAFNznXuto67KLjelDBLnYEQy'),
(72, 'marcelo.altenwerth@hotmail.com', 'Marcelo', 'Altenwerth', '$2y$10$1hRwFAGbTJvTrAoYxcYU9ePAfMasCZAikahXFMAEppKQj1.pvtDC.'),
(73, 'cole.christiansen@hotmail.com', 'Cole', 'Christiansen', '$2y$10$KIzGJlg2624VhC0lUU/G8e55PcmmlPnvm/LVuuDdN3IgxuTInPis.'),
(74, 'estelle.ledner@hotmail.com', 'Estelle', 'Ledner', '$2y$10$usAv2Xcp/RPj6LRqeoBdlOFtApmWALbgfwgNPHIzElqVrdVSNg9/G'),
(75, 'tamia.krajcik@gmail.com', 'Tamia', 'Krajcik', '$2y$10$fKzQVO/rK80X4f3ehhQy9.9XhmTDbDGe8wW3TeN4n9TMJB65EMHRG'),
(76, 'ashly.powlowski@gmail.com', 'Ashly', 'Powlowski', '$2y$10$d7YmQQgJOcjzDx6ahH7yueCI796GdOZD7Z/kAkKQe9qg2.qVh79fi'),
(77, 'stella.tromp@yahoo.com', 'Stella', 'Tromp', '$2y$10$6Y0TlMnFwUIPjNV/xlgLmey1utTlw9V3OAGjOPIkbuZT9GdQJOsyi'),
(78, 'noemi.hagenes@yahoo.com', 'Noemi', 'Hagenes', '$2y$10$UYijay/UQXkoNPsb0SdtAOcy.lpy73nUJCeivJuRSXvvbvCVQQ1hu'),
(79, 'violet.thompson@hotmail.com', 'Violet', 'Thompson', '$2y$10$dQp.KOTe3eJgzJZUu67zk..Jtvv2bPQaAYtr1UTOxRW5nk2JvQNOO'),
(80, 'sylvia.lowe@yahoo.com', 'Sylvia', 'Lowe', '$2y$10$p25E9Z0XOnApsUn866i0keoFyfhK6palok9OeOzGfDnnZvxuJdITa'),
(81, 'clyde.aufderhar@gmail.com', 'Clyde', 'Aufderhar', '$2y$10$KvVkIqLR.wl3uMx/Lu0zU.EB7.f.FnvtvSIurMto6AUxlNdp7opZO'),
(82, 'mac.dickens@gmail.com', 'Mac', 'Dickens', '$2y$10$Q4pQmGYVXr62tjCqYyTm0eWhDHGK5e5mauvsB/RccWyuYfNMxgWMK'),
(83, 'linnea.lehner@gmail.com', 'Linnea', 'Lehner', '$2y$10$OWOyZCM95F0ddLQDrCoxa.pW8elkzP/.Hq0hEF.nr/Lyn5yLUFfyK'),
(84, 'narciso.wilkinson@hotmail.com', 'Narciso', 'Wilkinson', '$2y$10$mKLzvLtv4r2hzt9cvRQhweJ1R4G4/imZlwmY8nJgwVxJIob0FoVFe'),
(85, 'pansy.o\'conner@gmail.com', 'Pansy', 'O\'Conner', '$2y$10$6ca8I3Uy8C6mADhCjAabyOzgjSzCRaEkC4xfV25vnGbGnUa870Isu'),
(86, 'marcel.king@hotmail.com', 'Marcel', 'King', '$2y$10$NXWR3cN6ofP84qqkhwrZMemq/WDER8QHm.YAhsGlcf0D13QFUHWaS'),
(87, 'soledad.waters@yahoo.com', 'Soledad', 'Waters', '$2y$10$BMAuORpRgFiaIm18WWkSfuDdRYow4oR3Nm2/H91o1ZUmXpDMs9FOW'),
(88, 'elisa.lehner@gmail.com', 'Elisa', 'Lehner', '$2y$10$z.zjuKkKzPvDsbviEilc7uIDQ326kUsCVH3caqE0TAOQ5kC7hBo3a'),
(89, 'diana.yost@gmail.com', 'Diana', 'Yost', '$2y$10$L9pwoCSHpynJfzXb1r.EYeo8FzA1mSrqLwvo2JCkIJY0Z2fU1yZlu'),
(90, 'rosetta.quitzon@yahoo.com', 'Rosetta', 'Quitzon', '$2y$10$bZal9p829EuHO.eIj4x8n.wSpBU7uejK6vwoL/X1E4dCZziX8BtYC'),
(91, 'wilfredo.fadel@yahoo.com', 'Wilfredo', 'Fadel', '$2y$10$DTxrj7mOx9HZWi9SPaQAZetyw2yYZ06Trs.MsVquUW7C89TfSeDga'),
(92, 'pearl.senger@gmail.com', 'Pearl', 'Senger', '$2y$10$Y4/FG5QqKeavxTMR/VnFFOkpCobTFOT751AZ3xYMqLObAwl8wL89q'),
(93, 'afton.medhurst@gmail.com', 'Afton', 'Medhurst', '$2y$10$Xws/YF4w6PGOVlalg9GFQOlkbx4qnK0HRwtgF0r/q0KPUeet25X2i'),
(94, 'nathanial.o\'conner@gmail.com', 'Nathanial', 'O\'Conner', '$2y$10$SbS3zqKWQWUa97qQ4tl63O3Ddx0JMu/JKA8tr1LfQmAOt0OxTWi0S'),
(95, 'josiane.rau@hotmail.com', 'Josiane', 'Rau', '$2y$10$32JU.S2WOdUzVYEUgY7jz.DcfvH3rdjcsyz0hVYgbqi.Ebqo.dm5.'),
(96, 'daija.jerde@hotmail.com', 'Daija', 'Jerde', '$2y$10$jT0Jp/iUQS7JBaypYoV5t.5MJYgq9foZv2vSuVt3aG0Z5CjypVSiu'),
(97, 'denis.howell@gmail.com', 'Denis', 'Howell', '$2y$10$LN9iiml5gxuJkNe4tWL4YeeTWz3U4jKIaFv5k.uJb63wzE9jtQBIO'),
(98, 'alek.leffler@yahoo.com', 'Alek', 'Leffler', '$2y$10$vIimKJPyKUqMN8/.AaY67u7htTrXTcnrHOpHzE4Z3CscNMtfh5J3i'),
(99, 'nyasia.rolfson@hotmail.com', 'Nyasia', 'Rolfson', '$2y$10$pVPWUP8DfaI/26wSBn53Bubt9F1wTok/jUW2ScExnhCDkF.wrOWuC'),
(100, 'frankie.king@yahoo.com', 'Frankie', 'King', '$2y$10$maloucOlnfNTI9mHLKMrAeiAY56T0hQPhLVrodmcj3wMouiKR4naW'),
(101, 'ernie.beer@yahoo.com', 'Ernie', 'Beer', '$2y$10$bYljm.ad46cEsEv0zcXYKeyKuvQo9M3chDLHFRorDmXWGdfbWvEn6'),
(102, 'dylan.hessel@yahoo.com', 'Dylan', 'Hessel', '$2y$10$roLKBJGlj3dT7spsainLceEf29xE1dV55dSahCPsQ9pHYtw7vDtzy'),
(103, 'scotty.herzog@hotmail.com', 'Scotty', 'Herzog', '$2y$10$YhYDrJcY/f1dMyCyeRK1gezrD4xXU.MQdB5B2HI0QhwjZuvpWPKeu'),
(104, 'adele.krajcik@hotmail.com', 'Adele', 'Krajcik', '$2y$10$TX5CKbsNrYOIIUO.8m5Zuu4NaU7.wklpqoJKFzal09ynA8qkCbzgy'),
(105, 'cathy.conn@gmail.com', 'Cathy', 'Conn', '$2y$10$L42rsjJQkXuGi9INaMiCFumMUdwVBPC17CMXgCvM9s.7M9btn8M9O'),
(106, 'dee.lynch@gmail.com', 'Dee', 'Lynch', '$2y$10$Y1awfBG3henGipcnP00qXOHu.A4t6CjvzBUnsKMuM7HUUlgP3CESO'),
(107, 'nikko.hayes@hotmail.com', 'Nikko', 'Hayes', '$2y$10$64Pw6qRCYGIS/dT6eIiYGeuaPXEiEGxcGi1XKvUjVKzKoHDgpFAli'),
(108, 'rene.lang@hotmail.com', 'Rene', 'Lang', '$2y$10$FSb51R/7kokm6OYHDK4CyuUaTeuxTvajn0DVW6DJYCg.JBDCpA3UO'),
(109, 'everette.grady@hotmail.com', 'Everette', 'Grady', '$2y$10$D/XDb.Q9yjS5yKzrcPNAE.Dc0ZwsinwIiVKwJOA3lUlydgaZUunhm'),
(110, 'connor.lindgren@gmail.com', 'Connor', 'Lindgren', '$2y$10$Ek3pwUni7ieOz/2EIMKbi.JLM6ZCpzRhiKIc7WGCWaZTsZj8S6hLq'),
(111, 'nikko.lueilwitz@gmail.com', 'Nikko', 'Lueilwitz', '$2y$10$j.B72SK5Wck1wfE4ijd4IuWpRWOZW77SBdwfuHDeSHwX303PECEmC'),
(112, 'ewell.bogan@hotmail.com', 'Ewell', 'Bogan', '$2y$10$rxVxegFsUmAyFAwKM/N/lOOM.Lv598DN.43bXrfnOdSdC1qG8uauG'),
(113, 'joana.kutch@hotmail.com', 'Joana', 'Kutch', '$2y$10$IaW/T3TMyn758prBBPydseNG7F4BXCm0p1pAgXIxyq.pe6jP6qE66');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

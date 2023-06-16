CREATE database if not exists `database`;

CREATE TABLE IF NOT EXISTS `database`.`users` 
(`id_user` INT NOT NULL AUTO_INCREMENT primary key,
 `last_name` VARCHAR(45) NOT NULL, 
 `first_name` VARCHAR(45) NOT NULL, 
 `adress` TEXT NOT NULL, 
 `phone` INT NOT NULL, 
 `email` TEXT NOT NULL,
 `pass` TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS `database`.`category` 
(`id_category` INT NOT NULL AUTO_INCREMENT primary key,
 `type` TEXT NOT NULL,
 `desc` TEXT NOT NULL
);

CREATE TABLE IF NOT EXISTS `database`.`product` 
(`id_product` INT NOT NULL AUTO_INCREMENT primary key,
 `filename` TEXT NOT NULL, 
 `name` TEXT NOT NULL,
 `desc` TEXT NOT NULL, 
 `price` INT NOT NULL,
 `stock` INT NOT NULL, 
 `id_category` INT NOT NULL,
 FOREIGN KEY (`id_category`) REFERENCES category(id_category)
);

CREATE TABLE IF NOT EXISTS `database`.`card` 
(`id_card` INT NOT NULL AUTO_INCREMENT primary key,
 `id_user` INT NOT NULL,
 FOREIGN KEY (`id_user`) REFERENCES users(id_user),
 `is_solde` BOOLEAN NOT NULL DEFAULT FALSE,
 `is_confirmed` BOOLEAN NOT NULL DEFAULT FALSE
);

CREATE TABLE IF NOT EXISTS `database`.`orders` 
(`id_order` INT NOT NULL AUTO_INCREMENT primary key, 
 `id_card` INT NOT NULL,
 FOREIGN KEY (`id_card`) REFERENCES card(id_card),
 `id_product` INT NOT NULL,
 FOREIGN KEY (`id_product`) REFERENCES product(id_product),
 `quantity` INT NOT NULL,
 `date_order` DATE DEFAULT CURRENT_TIMESTAMP 
);
CREATE TABLE IF NOT EXISTS `database`.`historique_des_achats` (
    id_historique INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT NOT NULL,
    id_order  INT NOT NULL,
    date_achat DATETIME NOT NULL,
    montant_total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (id_user) REFERENCES users(id_user),
    FOREIGN KEY (id_order ) REFERENCES orders(id_order )
);
-- REMPLISSAGE

INSERT INTO `database`.`category` (`type`, `desc`) VALUES
('Robes', 'Découvrez notre collection de robes d''été légères et élégantes pour toutes les occasions. Des robes maxi aux robes de plage décontractées, trouvez votre style parfait pour l''été.'),
('T-shirts homme', 'Explorez notre sélection de t-shirts pour hommes, des modèles tendance aux basiques essentiels. Trouvez le t-shirt parfait pour afficher votre style en été.'),
('T-shirts femme', 'Découvrez notre gamme de t-shirts pour femmes, allant des t-shirts imprimés aux t-shirts unis. Rafraîchissez votre garde-robe estivale avec nos t-shirts tendance.'),
('Chemisiers homme', 'Ajoutez une touche de style à votre look estival avec nos chemisiers pour hommes. Des chemises légères et décontractées aux chemises habillées, trouvez votre style.'),
('Chemisiers femme', 'Optez pour l"élégance avec nos chemisiers pour femmes. Que vous recherchiez une blouse fluide ou une chemise classique, trouvez votre chemisier idéal pour l"été.'),
('Shorts', 'Restez au frais et à l"aise avec nos shorts d"été pour hommes et femmes. Des shorts en jean décontractés aux shorts en tissu léger, trouvez votre style estival.'),
('Jupes', 'Ajoutez une touche féminine à votre garde-robe estivale avec nos jupes tendance. Des jupes longues aux jupes courtes, trouvez la jupe parfaite pour les journées ensoleillées.'),
('Accessoires', 'Complétez votre look estival avec nos accessoires tendance. Des chapeaux de soleil aux sacs de plage, trouvez les accessoires parfaits pour parfaire votre style estival.'),
('Sandales', 'Offrez à vos pieds le confort et le style qu"ils méritent avec nos sandales d"été. Découvrez notre collection de sandales pour hommes et femmes et préparez-vous à profiter du soleil.'),
('Tongs', 'Gardez vos pieds au frais avec nos tongs estivales. Découvrez notre sélection de tongs confortables et tendance pour hommes et femmes.'),
('Espadrilles', 'Optez pour un look décontracté et tendance avec nos espadrilles estivales. Des espadrilles plates aux plateformes, trouvez la paire parfaite pour compléter votre tenue estivale.'),
('Pantalons légers', 'Restez élégant et confortable avec nos pantalons légers pour l"été. Des pantalons fluides aux pantalons en lin, trouvez votre pantalon estival idéal.'),
('Tenues de sport', 'Restez actif et stylé avec nos tenues de sport estivales. Des ensembles de leggings et de débardeurs aux shorts de sport, trouvez votre tenue parfaite pour vos activités estivales.'),
('Vêtements de plage', 'Préparez-vous pour une journée à la plage avec nos vêtements de plage tendance. Des paréos aux tuniques de plage, complétez votre look de plage avec style.');

INSERT INTO `database`.`product` (`filename`, `name`, `desc`, `price`, `stock`, `id_category`) VALUES
('robe_1.jpg', 'Robe estivale à fleurs', 'Une magnifique robe estivale à fleurs avec un design léger et confortable. Parfait pour les journées ensoleillées.', 39.99, 10, 1),
('robe_2.jpg', 'Robe longue bohème', 'Une élégante robe longue bohème avec des motifs colorés et un style décontracté. Idéale pour les soirées d"été.', 49.99, 8, 1),
('robe_3.jpg', 'Robe sans manches en lin', 'Une robe sans manches en lin avec une coupe fluide et légère. Parfaite pour rester fraîche et élégante en été.', 34.99, 15, 1),
('robe_4.jpg', 'Robe midi à pois', 'Une robe midi élégante avec un motif à pois et une ceinture ajustable. Parfaite pour les occasions spéciales.', 54.99, 5, 1),
('robe_5.jpg', 'Robe d"été à volants', 'Une robe d"été légère avec des volants et une coupe décontractée. Parfaite pour les journées chaudes à la plage.', 29.99, 12, 1),
('robe_6.jpg', 'Robe à épaules dénudées', 'Une robe à épaules dénudées avec un design moderne et féminin. Parfaite pour les soirées estivales.', 42.99, 7, 1),
('robe_7.jpg', 'Robe courte en coton', 'Une robe courte en coton avec des manches courtes et un motif rayé. Idéale pour une tenue décontractée.', 31.99, 9, 1),
('robe_8.jpg', 'Robe chemise à pois', 'Une robe chemise légère avec un imprimé à pois et une ceinture pour mettre en valeur la taille. Parfaite pour un look chic.', 47.99, 6, 1),
('robe_9.jpg', 'Robe en dentelle blanche', 'Une robe en dentelle blanche avec un style romantique et féminin. Idéale pour les mariages et les occasions spéciales.', 59.99, 3, 1),
('robe_10.jpg', 'Robe à bretelles ajustables', 'Une robe légère à bretelles ajustables et à motif floral. Parfaite pour les journées ensoleillées et les escapades estivales.', 36.99, 11, 1);


INSERT INTO `database`.`product` (`filename`, `name`, `desc`, `price`, `stock`, `id_category`) VALUES
('tshirthomme_1.jpg', 'T-shirt en coton uni', 'Un t-shirt en coton uni, confortable et polyvalent. Parfait pour un look décontracté au quotidien.', 24.99, 15, 2),
('tshirthomme_2.jpg', 'T-shirt à rayures', 'Un t-shirt à rayures classique, intemporel et facile à porter. Idéal pour un style marin ou décontracté.', 29.99, 10, 2),
('tshirthomme_3.jpg', 'T-shirt imprimé graphique', 'Un t-shirt avec un imprimé graphique moderne et tendance. Ajoutez une touche de style à votre tenue.', 27.99, 12, 2),
('tshirthomme_4.jpg', 'T-shirt à col rond', 'Un t-shirt à col rond basique et essentiel dans toute garde-robe masculine. Disponible dans différentes couleurs.', 19.99, 20, 2),
('tshirthomme_5.jpg', 'T-shirt à manches longues', 'Un t-shirt à manches longues parfait pour les journées plus fraîches. Confortable et polyvalent.', 32.99, 8, 2),
('tshirthomme_6.jpg', 'T-shirt imprimé logo', 'Un t-shirt avec un logo imprimé, idéal pour afficher votre marque préférée ou votre style personnel.', 25.99, 15, 2),
('tshirthomme_7.jpg', 'T-shirt à col V', 'Un t-shirt à col en V flatteur pour une allure élégante et décontractée. Disponible dans différents coloris.', 23.99, 18, 2),
('tshirthomme_8.jpg', 'T-shirt à motifs géométriques', 'Un t-shirt avec des motifs géométriques pour un look original et moderne. Parfait pour se démarquer.', 28.99, 10, 2),
('tshirthomme_9.jpg', 'T-shirt à imprimé vintage', 'Un t-shirt avec un imprimé vintage rétro pour une touche de nostalgie. Style unique et tendance.', 26.99, 14, 2),
('tshirthomme_10.jpg', 'T-shirt à col polo', 'Un t-shirt à col polo pour un look sportif et élégant. Parfait pour une tenue décontractée ou semi-formelle.', 34.99, 9, 2);


INSERT INTO `database`.`product` (`filename`, `name`, `desc`, `price`, `stock`, `id_category`) VALUES
('tshirtfemme_1.jpg', 'T-shirt en coton uni', 'Un t-shirt en coton uni, confortable et polyvalent. Parfait pour un look décontracté au quotidien.', 24.99, 15, 3),
('tshirtfemme_2.jpg', 'T-shirt à rayures', 'Un t-shirt à rayures classique, intemporel et facile à porter. Idéal pour un style marin ou décontracté.', 29.99, 10, 3),
('tshirtfemme_3.jpg', 'T-shirt imprimé graphique', 'Un t-shirt avec un imprimé graphique moderne et tendance. Ajoutez une touche de style à votre tenue.', 27.99, 12, 3),
('tshirtfemme_4.jpg', 'T-shirt à col rond', 'Un t-shirt à col rond basique et essentiel dans toute garde-robe féminine. Disponible dans différentes couleurs.', 19.99, 20, 3),
('tshirtfemme_5.jpg', 'T-shirt à manches longues', 'Un t-shirt à manches longues parfait pour les journées plus fraîches. Confortable et polyvalent.', 32.99, 8, 3),
('tshirtfemme_6.jpg', 'T-shirt imprimé logo', 'Un t-shirt avec un logo imprimé, idéal pour afficher votre marque préférée ou votre style personnel.', 25.99, 15, 3),
('tshirtfemme_7.jpg', 'T-shirt à col V', 'Un t-shirt à col en V flatteur pour une allure élégante et décontractée. Disponible dans différents coloris.', 23.99, 18, 3),
('tshirtfemme_8.jpg', 'T-shirt à motifs géométriques', 'Un t-shirt avec des motifs géométriques pour un look original et moderne. Parfait pour se démarquer.', 28.99, 10, 3),
('tshirtfemme_9.jpg', 'T-shirt à imprimé vintage', 'Un t-shirt avec un imprimé vintage rétro pour une touche de nostalgie. Style unique et tendance.', 26.99, 14, 3),
('tshirtfemme_10.jpg', 'T-shirt à col polo', 'Un t-shirt à col polo pour un look sportif et élégant. Parfait pour une tenue décontractée ou semi-formelle.', 34.99, 9, 3);


INSERT INTO `database`.`product` (`filename`, `name`, `desc`, `price`, `stock`, `id_category`) VALUES
('chemisierhomme_1.jpg', 'Chemise à carreaux', 'Une chemise à carreaux classique et intemporelle pour un look décontracté. Parfaite pour toutes les saisons.', 39.99, 10, 4),
('chemisierhomme_2.jpg', 'Chemise en lin', 'Une chemise en lin légère et respirante, parfaite pour les journées chaudes d"été. Un choix élégant et confortable.', 49.99, 8, 4),
('chemisierhomme_3.jpg', 'Chemise à manches courtes', 'Une chemise à manches courtes pour un look décontracté et estival. Idéale pour les occasions informelles.', 34.99, 12, 4),
('chemisierhomme_4.jpg', 'Chemise à col mao', 'Une chemise à col mao pour un look moderne et élégant. Parfaite pour ajouter une touche de sophistication à votre tenue.', 42.99, 9, 4),
('chemisierhomme_5.jpg', 'Chemise en denim', 'Une chemise en denim résistante et polyvalente. Un choix intemporel pour un look décontracté et branché.', 44.99, 15, 4),
('chemisierhomme_6.jpg', 'Chemise à rayures fines', 'Une chemise à rayures fines pour un style élégant et raffiné. Parfaite pour les occasions formelles ou professionnelles.', 46.99, 7, 4),
('chemisierhomme_7.jpg', 'Chemise à imprimé fleuri', 'Une chemise à imprimé fleuri pour un look estival et frais. Ajoutez une touche de couleur à votre tenue.', 38.99, 11, 4),
('chemisierhomme_8.jpg', 'Chemise à pois', 'Une chemise à pois pour un style original et tendance. Parfaite pour se démarquer et ajouter une touche d"audace.', 36.99, 14, 4),
('chemisierhomme_9.jpg', 'Chemise à col boutonné', 'Une chemise à col boutonné classique et polyvalente. Un choix essentiel pour une tenue élégante et décontractée.', 32.99, 17, 4),
('chemisierhomme_10.jpg', 'Chemise à manches longues', 'Une chemise à manches longues pour les journées plus fraîches. Confortable et polyvalente, elle s"adapte à différents styles.', 40.99, 13, 4);

INSERT INTO `database`.`product` (`filename`, `name`, `desc`, `price`, `stock`, `id_category`) VALUES
('chemisierfemme_1.jpg', 'Chemisier à pois', 'Un chemisier à pois pour un look féminin et élégant. Parfait pour les occasions formelles ou décontractées.', 29.99, 10, 5),
('chemisierfemme_2.jpg', 'Chemisier en soie', 'Un chemisier en soie luxueux et confortable. Ajoutez une touche de glamour à votre tenue avec cette pièce élégante.', 49.99, 8, 5),
('chemisierfemme_3.jpg', 'Chemisier à volants', 'Un chemisier à volants pour un style romantique et féminin. Parfait pour les journées ensoleillées ou les occasions spéciales.', 34.99, 12, 5),
('chemisierfemme_4.jpg', 'Chemisier à rayures', 'Un chemisier à rayures classique et intemporel. Parfait pour un look élégant et raffiné au quotidien.', 42.99, 9, 5),
('chemisierfemme_5.jpg', 'Chemisier à manches courtes', 'Un chemisier à manches courtes pour un look décontracté et estival. Polyvalent et confortable, il s"adapte à toutes les occasions.', 39.99, 15, 5),
('chemisierfemme_6.jpg', 'Chemisier à dentelle', 'Un chemisier à dentelle délicate et féminine. Ajoutez une touche de sophistication à votre tenue avec cette pièce raffinée.', 36.99, 7, 5),
('chemisierfemme_7.jpg', 'Chemisier à imprimé floral', 'Un chemisier à imprimé floral pour un look frais et estival. Parfait pour ajouter une touche de couleur à votre tenue.', 38.99, 11, 5),
('chemisierfemme_8.jpg', 'Chemisier en satin', 'Un chemisier en satin lisse et élégant. Ajoutez une note de luxe à votre tenue avec cette pièce sophistiquée.', 45.99, 9, 5),
('chemisierfemme_9.jpg', 'Chemisier à épaules dénudées', 'Un chemisier à épaules dénudées pour un look séduisant et tendance. Parfait pour les soirées et les occasions spéciales.', 32.99, 17, 5),
('chemisierfemme_10.jpg', 'Chemisier à col lavallière', 'Un chemisier à col lavallière pour un style rétro et élégant. Parfait pour un look vintage et sophistiqué.', 40.99, 13, 5);

INSERT INTO `database`.`product` (`filename`, `name`, `desc`, `price`, `stock`, `id_category`) VALUES
('shorts_1.jpg', 'Short en jean', 'Un short en jean décontracté et polyvalent. Parfait pour les journées ensoleillées et les looks décontractés.', 24.99, 15, 6),
('shorts_2.jpg', 'Short en lin', 'Un short en lin léger et respirant. Idéal pour les journées chaudes d"été et les activités de plein air.', 29.99, 12, 6),
('shorts_3.jpg', 'Short à motifs', 'Un short à motifs colorés et amusants. Ajoutez une touche de fantaisie à votre tenue estivale avec ce short original.', 27.99, 10, 6),
('shorts_4.jpg', 'Short en coton', 'Un short en coton confortable et polyvalent. Parfait pour un look décontracté et décontracté au quotidien.', 22.99, 20, 6),
('shorts_5.jpg', 'Short en denim', 'Un short en denim classique et intemporel. Un incontournable de la garde-robe estivale pour un look tendance.', 26.99, 18, 6),
('shorts_6.jpg', 'Short de plage', 'Un short de plage léger et résistant à l"eau. Parfait pour les journées ensoleillées à la plage ou à la piscine.', 19.99, 25, 6),
('shorts_7.jpg', 'Short en lin à rayures', 'Un short en lin à rayures pour un look estival et élégant. Ajoutez une touche de sophistication à votre tenue.', 31.99, 10, 6),
('shorts_8.jpg', 'Short en crochet', 'Un short en crochet féminin et bohème. Parfait pour les festivals et les occasions décontractées.', 28.99, 15, 6),
('shorts_9.jpg', 'Short en simili cuir', 'Un short en simili cuir pour un look audacieux et moderne. Ajoutez une touche de rock à votre tenue.', 33.99, 8, 6),
('shorts_10.jpg', 'Short en lin à ceinture', 'Un short en lin avec une ceinture pour un look estival et chic. Parfait pour les occasions spéciales ou les sorties en ville.', 35.99, 12, 6);

INSERT INTO `database`.`product` (`filename`, `name`, `desc`, `price`, `stock`, `id_category`) VALUES
('jupe_1.jpg', 'Jupe plissée', 'Une jupe plissée élégante et féminine. Parfaite pour les occasions spéciales ou pour ajouter une touche d"élégance à votre tenue quotidienne.', 39.99, 15, 7),
('jupe_2.jpg', 'Jupe en jean', 'Une jupe en jean décontractée et polyvalente. Idéale pour les looks décontractés et les journées ensoleillées.', 34.99, 12, 7),
('jupe_3.jpg', 'Jupe midi à pois', 'Une jupe midi à pois pour un look rétro et chic. Ajoutez une touche de sophistication à votre tenue.', 42.99, 10, 7),
('jupe_4.jpg', 'Jupe en cuir', 'Une jupe en cuir pour un look audacieux et moderne. Parfaite pour les soirées et les occasions spéciales.', 59.99, 8, 7),
('jupe_5.jpg', 'Jupe en tulle', 'Une jupe en tulle romantique et féminine. Idéale pour les occasions spéciales et les événements formels.', 49.99, 10, 7),
('jupe_6.jpg', 'Jupe crayon', 'Une jupe crayon élégante et classique. Parfaite pour les looks professionnels et les occasions formelles.', 45.99, 15, 7),
('jupe_7.jpg', 'Jupe plissée métallisée', 'Une jupe plissée métallisée pour un look glamour et festif. Idéale pour les fêtes et les événements spéciaux.', 54.99, 12, 7),
('jupe_8.jpg', 'Jupe en velours', 'Une jupe en velours douce et luxueuse. Parfaite pour les soirées et les occasions élégantes.', 49.99, 10, 7),
('jupe_9.jpg', 'Jupe à imprimé floral', 'Une jupe à imprimé floral pour un look frais et estival. Ajoutez une touche de féminité à votre tenue.', 37.99, 18, 7),
('jupe_10.jpg', 'Jupe plissée métallisée', 'Une jupe plissée métallisée pour un look glamour et festif. Idéale pour les fêtes et les événements spéciaux.', 54.99, 12, 7);


INSERT INTO `database`.`product` (`filename`, `name`, `desc`, `price`, `stock`, `id_category`) VALUES
('accessoire_1.jpg', 'Sac fourre-tout en paille', 'Un sac fourre-tout en paille tressée, idéal pour une journée à la plage ou une promenade en ville.', 29.99, 20, 8),
('accessoire_2.jpg', 'Chapeau de paille', 'Un chapeau de paille à larges bords pour vous protéger du soleil avec style.', 19.99, 15, 8),
('accessoire_3.jpg', 'Lunettes de soleil aviateur', 'Des lunettes de soleil aviateur avec monture en métal pour un look rétro et cool.', 24.99, 18, 8),
('accessoire_4.jpg', 'Foulard imprimé', 'Un foulard coloré et léger pour accessoiriser vos tenues estivales.', 14.99, 25, 8),
('accessoire_5.jpg', 'Ceinture en cuir', 'Une ceinture en cuir avec boucle métallique pour ajouter une touche d"élégance à votre tenue.', 22.99, 20, 8),
('accessoire_6.jpg', 'Bracelet en perles', 'Un bracelet en perles colorées pour un style bohème et décontracté.', 12.99, 30, 8),
('accessoire_7.jpg', 'Sac à dos en toile', 'Un sac à dos en toile résistant pour transporter vos affaires lors de vos escapades estivales.', 34.99, 12, 8),
('accessoire_8.jpg', 'Casquette ajustable', 'Une casquette ajustable avec logo brodé pour un look sportif et décontracté.', 16.99, 25, 8),
('accessoire_9.jpg', 'Collier ras-du-cou', 'Un collier ras-du-cou avec pendentif en pierre pour une touche de sophistication.', 18.99, 20, 8),
('accessoire_10.jpg', 'Écharpe légère', 'Une écharpe légère et fluide pour vous protéger des brises estivales.', 14.99, 30, 8);


INSERT INTO `database`.`product` (`filename`, `name`, `desc`, `price`, `stock`, `id_category`) VALUES
('sandale_1.jpg', 'Sandales à lanières', 'Des sandales à lanières élégantes et confortables pour un look estival.', 49.99, 15, 9),
('sandale_2.jpg', 'Sandales plates en cuir', 'Des sandales plates en cuir avec bride ajustable pour une marche agréable tout au long de la journée.', 54.99, 12, 9),
('sandale_3.jpg', 'Sandales compensées', 'Des sandales compensées avec semelle en corde pour un look bohème et chic.', 59.99, 10, 9),
('sandale_4.jpg', 'Sandales à talons', 'Des sandales à talons hauts avec bride arrière pour une touche de sophistication.', 64.99, 8, 9),
('sandale_5.jpg', 'Sandales à franges', 'Des sandales à franges pour un look tendance et décontracté.', 44.99, 10, 9),
('sandale_6.jpg', 'Sandales à plateforme', 'Des sandales à plateforme pour une allure moderne et élégante.', 59.99, 15, 9),
('sandale_7.jpg', 'Sandales en cuir tressé', 'Des sandales en cuir tressé pour un style estival et artisanal.', 49.99, 12, 9),
('sandale_8.jpg', 'Sandales à lacets', 'Des sandales à lacets pour un look bohème et romantique.', 54.99, 10, 9),
('sandale_9.jpg', 'Sandales à talons compensés', 'Des sandales à talons compensés pour une démarche confortable et féminine.', 59.99, 18, 9),
('sandale_10.jpg', 'Sandales à ornements', 'Des sandales ornées de perles et de strass pour un look glamour.', 64.99, 12, 9);



INSERT INTO `database`.`product` (`filename`, `name`, `desc`, `price`, `stock`, `id_category`) VALUES
('tongs_1.jpg', 'Tongs classiques', 'Des tongs classiques et confortables pour les journées estivales.', 14.99, 20, 10),
('tongs_2.jpg', 'Tongs en caoutchouc', 'Des tongs en caoutchouc résistantes à l"eau pour la plage et la piscine.', 12.99, 25, 10),
('tongs_3.jpg', 'Tongs à imprimé tropical', 'Des tongs avec un imprimé tropical pour un look exotique et coloré.', 16.99, 18, 10),
('tongs_4.jpg', 'Tongs à semelle épaisse', 'Des tongs avec une semelle épaisse pour un meilleur soutien et confort.', 19.99, 15, 10),
('tongs_5.jpg', 'Tongs en cuir', 'Des tongs en cuir pour un look plus sophistiqué et élégant.', 24.99, 12, 10),
('tongs_6.jpg', 'Tongs à franges', 'Des tongs avec des franges pour un style bohème et décontracté.', 16.99, 20, 10),
('tongs_7.jpg', 'Tongs à motifs géométriques', 'Des tongs avec des motifs géométriques pour un look original et tendance.', 18.99, 15, 10),
('tongs_8.jpg', 'Tongs à paillettes', 'Des tongs avec des paillettes pour un look étincelant et festif.', 21.99, 10, 10),
('tongs_9.jpg', 'Tongs à imprimé animal', 'Des tongs avec un imprimé animal pour un look sauvage et tendance.', 16.99, 18, 10),
('tongs_10.jpg', 'Tongs à semelle ergonomique', 'Des tongs avec une semelle ergonomique pour un confort optimal.', 19.99, 15, 10);




INSERT INTO `database`.`product` (`filename`, `name`, `desc`, `price`, `stock`, `id_category`) VALUES
('espadrille_1.jpg', 'Espadrilles en toile', 'Des espadrilles en toile légères et confortables pour un style décontracté.', 34.99, 15, 11),
('espadrille_2.jpg', 'Espadrilles à rayures', 'Des espadrilles à rayures colorées pour un look estival et tendance.', 39.99, 12, 11),
('espadrille_3.jpg', 'Espadrilles en dentelle', 'Des espadrilles en dentelle délicate pour une touche féminine et romantique.', 42.99, 10, 11),
('espadrille_4.jpg', 'Espadrilles à talons compensés', 'Des espadrilles à talons compensés pour une allure élégante et confortable.', 49.99, 8, 11),
('espadrille_5.jpg', 'Espadrilles à lacets', 'Des espadrilles à lacets pour un look décontracté et moderne.', 37.99, 10, 11),
('espadrille_6.jpg', 'Espadrilles à imprimé floral', 'Des espadrilles à imprimé floral pour un look frais et printanier.', 44.99, 15, 11),
('espadrille_7.jpg', 'Espadrilles en cuir', 'Des espadrilles en cuir véritable pour un style raffiné et durable.', 54.99, 12, 11),
('espadrille_8.jpg', 'Espadrilles à paillettes', 'Des espadrilles à paillettes pour un look étincelant et festif.', 46.99, 10, 11),
('espadrille_9.jpg', 'Espadrilles à plateforme', 'Des espadrilles à plateforme pour une allure moderne et audacieuse.', 49.99, 18, 11),
('espadrille_10.jpg', 'Espadrilles à imprimé léopard', 'Des espadrilles à imprimé léopard pour un look sauvage et tendance.', 42.99, 12, 11);


INSERT INTO `database`.`product` (`filename`, `name`, `desc`, `price`, `stock`, `id_category`) VALUES
('pantalon_1.jpg', 'Pantalon en lin', 'Un pantalon en lin léger et respirant, parfait pour les journées chaudes.', 59.99, 20, 12),
('pantalon_2.jpg', 'Pantalon fluide', 'Un pantalon fluide et confortable, idéal pour un look décontracté.', 49.99, 18, 12),
('pantalon_3.jpg', 'Pantalon palazzo', 'Un pantalon palazzo élégant et ample, pour un style chic et féminin.', 69.99, 15, 12),
('pantalon_4.jpg', 'Pantalon cargo', 'Un pantalon cargo pratique et tendance, avec de multiples poches.', 64.99, 12, 12),
('pantalon_5.jpg', 'Pantalon à rayures', 'Un pantalon léger à rayures, pour un look estival et sophistiqué.', 54.99, 20, 12),
('pantalon_6.jpg', 'Pantalon sarouel', 'Un pantalon sarouel confortable et décontracté, pour une allure bohème.', 44.99, 15, 12),
('pantalon_7.jpg', 'Pantalon cigarette', 'Un pantalon cigarette ajusté et élégant, parfait pour les occasions spéciales.', 59.99, 10, 12),
('pantalon_8.jpg', 'Pantalon à motifs floraux', 'Un pantalon léger à motifs floraux, pour un look frais et printanier.', 49.99, 18, 12),
('pantalon_9.jpg', 'Pantalon à taille haute', 'Un pantalon léger à taille haute, pour mettre en valeur votre silhouette.', 54.99, 15, 12),
('pantalon_10.jpg', 'Pantalon large', 'Un pantalon large et confortable, pour un style décontracté et moderne.', 44.99, 20, 12);


INSERT INTO `database`.`product` (`filename`, `name`, `desc`, `price`, `stock`, `id_category`) VALUES
('tenue_sport_1.jpg', 'Ensemble de sport leggings et brassière', 'Un ensemble de sport composé d"un legging et d"une brassière, parfait pour vos séances d"entraînement.', 79.99, 15, 13),
('tenue_sport_2.jpg', 'T-shirt de sport respirant', 'Un t-shirt de sport respirant, idéal pour rester au frais pendant l"effort.', 29.99, 20, 13),
('tenue_sport_3.jpg', 'Short de sport léger', 'Un short de sport léger et confortable, pour une totale liberté de mouvement.', 39.99, 18, 13),
('tenue_sport_4.jpg', 'Débardeur de sport', 'Un débardeur de sport ajusté et stylé, pour une allure dynamique pendant vos séances.', 24.99, 15, 13),
('tenue_sport_5.jpg', 'Pantalon de jogging', 'Un pantalon de jogging doux et confortable, parfait pour vos activités sportives en extérieur.', 49.99, 12, 13),
('tenue_sport_6.jpg', 'Veste de sport légère', 'Une veste de sport légère et résistante, pour vous protéger du vent et des intempéries.', 69.99, 10, 13),
('tenue_sport_7.jpg', 'Legging de sport', 'Un legging de sport extensible et respirant, pour une sensation de seconde peau pendant l"effort.', 54.99, 20, 13),
('tenue_sport_8.jpg', 'Brassière de sport', 'Une brassière de sport avec un bon maintien, pour un confort optimal pendant vos activités.', 34.99, 15, 13),
('tenue_sport_9.jpg', 'Ensemble de sport leggings et t-shirt', 'Un ensemble de sport composé d"un legging et d"un t-shirt, pour une tenue complète et tendance.', 89.99, 18, 13),
('tenue_sport_10.jpg', 'Short de sport à motif camouflage', 'Un short de sport avec un motif camouflage, pour un look urbain et moderne.', 44.99, 20, 13);

INSERT INTO `database`.`product` (`filename`, `name`, `desc`, `price`, `stock`, `id_category`) VALUES
('vetement_plage_1.jpg', 'Maillot de bain une pièce', 'Un maillot de bain une pièce élégant et confortable, pour profiter de la plage avec style.', 49.99, 15, 14),
('vetement_plage_2.jpg', 'Maillot de bain bikini', 'Un maillot de bain bikini tendance, pour un look sexy et estival.', 39.99, 18, 14),
('vetement_plage_3.jpg', 'Robe de plage légère', 'Une robe de plage légère et fluide, parfaite pour se promener sur le sable.', 34.99, 20, 14),
('vetement_plage_4.jpg', 'Tunique de plage', 'Une tunique de plage légère et colorée, pour un look bohème et décontracté.', 29.99, 20, 14),
('vetement_plage_5.jpg', 'Short de plage', 'Un short de plage court et confortable, idéal pour se baigner et se promener.', 24.99, 25, 14),
('vetement_plage_6.jpg', 'Chapeau de paille', 'Un chapeau de paille chic et pratique, pour se protéger du soleil sur la plage.', 19.99, 30, 14),
('vetement_plage_7.jpg', 'Paréo', 'Un paréo polyvalent et léger, à porter comme une jupe, une robe ou un haut.', 14.99, 35, 14),
('vetement_plage_8.jpg', 'Kimono de plage', 'Un kimono de plage élégant et fluide, pour un look sophistiqué en bord de mer.', 39.99, 12, 14),
('vetement_plage_9.jpg', 'Ensemble bikini et paréo', 'Un ensemble bikini assorti à un paréo, pour une tenue complète et stylée sur la plage.', 59.99, 10, 14),
('vetement_plage_10.jpg', 'Tongs de plage', 'Des tongs légères et confortables, indispensables pour se déplacer sur le sable.', 19.99, 30, 14);


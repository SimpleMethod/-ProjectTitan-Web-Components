
CREATE TABLE IF NOT EXISTS `ProjectTitan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nick` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Kills` bigint(18) NOT NULL DEFAULT '0',
  `Death` bigint(18) NOT NULL DEFAULT '0',
  `NumberPD` bigint(18) NOT NULL DEFAULT '0',
  PRIMARY KEY (ID)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

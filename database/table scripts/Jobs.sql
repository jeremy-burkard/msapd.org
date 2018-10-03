SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";




CREATE TABLE IF NOT EXISTS `jobs` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Desc` varchar(500) NOT NULL,
  `Season` year(4) DEFAULT NULL,
  `StartDate` date NOT NULL,
  `StartTime` time DEFAULT NULL,
  `EndDate` date DEFAULT NULL,
  `EndTime` time DEFAULT NULL,
  `Location` varchar(100) NOT NULL,
  `MapURL` varchar(500) NOT NULL,
  `MoreInfo` varchar(100) NOT NULL,
  `MoreInfoURL` varchar(500) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

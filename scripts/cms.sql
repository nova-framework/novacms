# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: localhost (MySQL 5.7.18)
# Database: novacms
# Generation Time: 2017-06-04 20:08:28 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table nova_cache
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_cache`;

CREATE TABLE `nova_cache` (
  `id` varchar(255) NOT NULL,
  `key` text NOT NULL,
  `value` text NOT NULL,
  `expiration` timestamp NULL DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nova_cache` WRITE;
/*!40000 ALTER TABLE `nova_cache` DISABLE KEYS */;

INSERT INTO `nova_cache` (`id`, `key`, `value`, `expiration`)
VALUES
	('','novasystem_options','eyJpdiI6IndNUlRSRVVYSDlLTVNua250STBycXc9PSIsInZhbHVlIjoiWFVRSzQ2c1pkcmN1K0lHUlpNdGYxZ3A2V1pJWW90bWVVUE5aeXdvcWRiZEZLaGlKWkt3RFl3MXhwT0tRREFDOTBodWZOUmJiWjZyMkxQYlNnTUNLelJ6UHFSYzVPNG1kNEpGOXJsd25JSldYb3dibnFmOXJidE5wV0d6Q2h5Y3FPV05aODJ0bXRkcE9qQnNxMk04bDhKRFBOcDhzeVdMUWxxdnVKSlVnVTdxR2drMXh3RnlxZGFITWlvRmdBT3hHVHBJXC9JMXVQWkZyOXNcL09BbSthMGkxcUJRNWI1QjAzb3NEb2xROWlzdEcyMWh0bmo4OWdURFFWcllRQ0JaYWxPRXNyNnBsd1JTQ2ZORGx6aEd6dVFnZU1BM1dVbzBcL3oxbVdiUElrWWg5WGhDeHcxaTBuTkx0bnZnYjNqZ0tVUUw0WjJjTzRaajlxXC9icU9sZzJ5VzR0MXU5RzlNMHk4bWxqc2c1bCtpU0FHR1wvbWc3RklmXC93WFhxSmhqT3NcL1lyZkZ0c29YdnAwa2h4K3dPQXhMRW9SNmRGMFlXbWlCeVdNWW5rY2o4SEt4M21lN3dQXC9hU3Y1OXo4b29FRmNsK0xjRCt5cHhoanZKSDc5NlYrREc2VmdncGgzbnlhWGd4RWpnejR6TWFSSE9uZHJlRENhVHZQN0RlaVNwU2dNc2FKY2FcLzhMK0dmTUtTMlpVK0ZRYVV5U0VEak9iWit2STVwMXFtTktqWHE2ODlXRHdIdUFPdVk4U0tiZWRPTjErTWZmdDBIeTUxWUNBMVwvZHZ6N3RXdlF5cFVJQkJpbThINHY5NVl0RE9DVEU0cHpzSHVkSWtCRDBPNVFKQThIcGhZU25QRUdwZW5PUVNvTlVrWFlaWkZmVlBwXC9wd0lcLzZieERiTGVFd1Q3aGRubm81OEloQit2Y2hCUWoyb2s2dUZrVnVUUHljYUtIa3o0ckpvb1ZoRTJnRFJRZ0JTbERvdFNxbkNmZmRXKzVncDdySjU2M1o0R2hza09iXC9Gc2gwQ09cL0hTbkFMUlN2clRNUDRYQ2pVREZKM2pwWE5INWFaU09vQ0dTbWUzalVPMkJwc01XNUVqdkJ0SVRLOFdhQUYrSHFZdDVIaFFHakRDYXZWejUzTVNZN05BeGFmajlnRTM3TlZ5YVAwQXJXZTdVYk5tVXJ1RDBMSWVrajByckxKZzBrNGlXVjMyTlwvU3RUZzlDSEhReTZWVzBZRkEyZnluRGFEZThMMXJPdEZ1TDhrM0J5aXVwRHpEeURaa0Q5QTlwSEtHS0d2b0VOMTdtNjJNYmEzOE9weXJpZVF2Qjg5OWtwVDg1aTVmRzh0Tm9aZVZBWjFRK2dHSUFNemhmaFk0dFRFR05WYjFMM2dXODJsaHBGTHZTbHUxc2FjdUcyM255S20yYk5ONFJHZmx1WTZtSGp4WVFZSlZaNkFEQVRwak9UajJDc2dURkR3d1JZaStVa1o4ZjBSMlVwcmZTN2FWWm5sakZGUTd3T2w3YW5KMHpGOEJ0M3pFS3dpc1dJN0xMc1k1VHNreXNhVVNEMm1TUUZyMTU1RnlHbkNNQXllSm1yaUNIVVBtaHlFbXBcL1FWWEpOeTYzMWpFVml4SjBYOXlmdkwwd0FMY1JOdzUrS3J3WWtDbUpzN0xQWkFkNGNQaUtnRzlRMzErT3NzVzB3M3ZjY2xsZjRXbDB2MHl5VWZzMUN4ZlZBa2xPTWlsVEFtdnppZ21rdUtrZTRsQmJ3a1hmSFJrXC81S1pQd2I0cnY2enN1M1h2RkdWeHoyaWV5QVc2QVwvZmd6TEJkenVRMUhyd0lVZTE3a3pST2ROaDNMSTJYVHpERVkwTzlJOW4rUHRuYURmQU5mXC9DbXZ1bCtMK0s5cFlpMDl6NEh3SVhvZlA2aURNM1VOalwvdDI2dlptaXgyXC9kZXFpZ1ljVDRMU2tiME1XNWVqamRSdG9wZVNYYUpNMEdtbEhcL3FhYnI0N2lVMnVrS3YzWWFGQW9CR0JRNFRGWEZCbTdZQTFJTmdtdVd2WDF1RTVwTU4wUUd2S0x2b3RSOHdiU0ZxUkNSeFFQYmJtZnJEcHJOUThXcVR4Rm5EKzdCUmtcL1JjTW5uT0kwV3ZcL1NtVnRxamdQRWJsWm1HdkgxbzVrbmdEbTRrSlJ5cWRsckkwV2ZsMWRiZTNLMFA3Rld6am51d1BQd2N0aVlQYkV2Y1VxMnRLWjl5blZVZExJSzJZeVVLdG1uSU9tOFZtQ3BsZW45bHJvejRENjlqZTJPMnlaU3dvM29EYnY0NHE5NkdSb21yQU11eDJxaHhyNTBmenRqaTRPWXRWQVJ0WXFPS0tZWHZGeUcyaHBBMnk0VGNCbExHcFBpaUQzODVCQjhSZmR0a2gzT2poejNWd3gzUjJkXC9uK29oYVI4MHVrU1JPdTYxbkZ6ZjJFOTlxV25OVUNIVWh6Qm5tMjUzbWhxR1ZlVHBpYTl5S1YySDZhc3hScE1PRGs0am1pb0p6MWJqYlNpYzVjQnZUS0Z3U1VhcUlQT1o3YmIzNytkY1wvazNMNzV4RWU3Qmh6a25IaVg1aVI3eTJrK3ZPd2lGWlJkZ2s4YStkV0Rmajc2UjUzejdJVjJCeklCMjdtUDl5VERUU1hLbzc3VFkzOTF2SWdpM0xaaEhkSzkwSmdRbUpvc2xWRXF2bDFDekx1OFI2UmhzUmxvalJGanNHaFA3XC9raHFyMDgwZ2loUlFVMUFiMkFWOEhqNGM3MUZvUnFMTGxhOSttSTBvcVI2VlVwUnAyc29NOElYdU52Vk8yWkh4UWRENStESTRmYlBaRm5wak1SMVgxbndNSmhVV3QwQjRYUnZGd1wvckkxR3ljcE9RdGcrNmV5OUJnVmRpRlZ5d3NpanNWQ0NGNW4rdUkrMDdVWGYxczVYV3NPbE5TVVJadmlHSGVJTnQrWVczZHpHaDE4cGl0Z2NCYm1JTFFXY2FLK1pUalg3dTNjT0h5M1VQMm1XMHpSUHlFSFAzbGluRlllYWFpc3lVM3hKTnZ5Q0NDWm1oZHJVaHRkQVJwV2dMZVArVm5CN080XC9BM0c5T1BNaGZPak5oUGJ0cloyQ1wvXC9YNVVhUXVWblNHSXFEaWJEYnBlejhvQUt1SkdQMGlrb1NKYmQrRmxvelpySUE4MHFoXC9YcWRvVFlRWVpyRUszT21YNituVWM0cE83MExMZndxM0JhWG9TMkhiMnVob3A4UmZiV3VBamNHcmM0XC81V1ZkZG4wQmFzQVhVeU13Q25SZEQyK0N6cFwvaWJUeTd0alNZeGR4cHVPVTNwXC9NXC9CYklCdGtnZDBnYWJjOEZBXC9JQkhwdkhLcjR4Q25qcHI3Z1NJVVdiK29tUkdzMUwrcVQyZ2dwSUh4Mkc4cUFqNTlyeGhIMGZQMlEzK1wvSitiMER2RDFHODFJR053amtNaEJqQlpsWG1RUWt3Mk4rbW5sdGVVWU9LSHZZNUJubjZDMFFIblljY1cyS2pDODVjSmluc1wvRmNxQzQzYU1ublgrOGRhT081aUg3Vjd3eXVpS21qWFBvWmg3dnhPTndZVDUraHlPSGRXMlZ5dEdFblVyalpsVkw0OWh3dlVaS3h1eGpuNUtQWDVPa2NhWU0zS2h1RCtFSGd1REViSTVHQ1BTWWd3YUd4ODlvV2hHRkRVSDJPY1hFNnkzNkFTMk9pbkNCNWVpSGZOMEQ3dlVsNFhyQ1M0clFXTUhRcjcwaEphc0VKMlpkQXVOaDN5aWJ6c2VUXC9pYlZFUkRRTm1HYkJXM25EVE5PMk43WmdzekRwK1pCUUZMTCs2Ync0QnI5aHhReVBnaDM3Z3lCVm1JT2pNTWtReVpUM1B2b0J2WFJadWc1bGw5ME5SR2pGemhXb2hpb0JGK0dUU0tZXC83T2VUMzJ4T3J2cTQrYVllWmFxV1dQNHE5TmtUVkc3dmJBV2xVMTQ3WHNsY2RsSVwvanBHakxna09aTGZYd0RwK2NpTE41Z0RcL0tGSUlrMVpUamtYeDVRN3ZoUVMxcVJuR3JoaWVKTnJxdEhSRmZ3OVV1NjBUNVVIdFlMUkprZkdzTmcxakhHNmJGOWxSUEREcGs5WnRjNUtmaWxDNXlmclRuaWZNVkw2ZEtOSmlaazd0ZFwvRllyU2YyMlJ3UU8zMGZldTNWTWh2bU5BaHdDZW5IYTdOWXdUZGowc0xBd0V5MUxyVnhSenV5XC9XTWdhR0Irc3h2T0c0bGRMeWNXb3dFcWl4dWdXaU1cL0ViRkkwXC90YXdBTFUybDVWaE1kVFwvYjRNR0xXcXpvREkxNWtSN1dnRVFtNFB0UXNCbXVVTUE5eElsR3ZFTzR3U3EzU3BxYkQ5S242cHlxcHNzbnNIeW1ndUQ3dThtQ1Z5TDdQODAzWFdMZmt6Q0pzSjdaZ3l5TGZ6ZjNJSXo2VnIzU3hOQ0U1WmJRQWZvTm9EWG5NeHd0SmVXaGxDeUE3M3RBa2EwRHR4YkE2WjJuWGcxZzhLcWorVHBXUDNONWJ0TXdJVVJZTDlxcmx3RkxQUTgxYjhDWEFRS1ZjK1ZoUWJBbXJNbHNiQ05WZ0VzVk5WSlUxdlFrY25yajNGUHV6UWtlbDgxdmJORkhFN1lnUHdzbExBZEorSDFCeVg2STFQQnlHXC9FWkFsbXowU0diSkt5SmpieWFYZnNkdGl6a09XeUVXZ0tvWmZRV0QyWGhLMUh6VkE0THNRc2hcL2FPUEc1VEZVZEhLaWg4WThieVl4RTJsdzRybEsybGdRMlhsMWExemdSalVoa1JqQXBKMFwvbCtBSE1TRnVoRHZ4N1dGZGRDUHl4OEw4eVJaQ21NUGVtVFd6WUZVcEthS3lBQ0JXZTNXWDlocTZ3ZWJvTHNLenVWbnV2T3FMMCtTTFpVSGtxVGgya1JKUjQwOStuQWZJKzFLN0JUVmh3QlErOTVaZWFOY3F1V0VHU3gzcWM0dVdkU2luUWRtWW9uaVdFeFdBUCtsT0ZYY1VHdVwvQTM0UjZiNFB5blVpVjlVT1JJYUlxczRGdDh0YTdhMkwrTUJUbHgrYVJsM0tDNkVWS2tEUHFiMlZvU2ZMR1d3TCtXbW5ZTnhUMmI4WEU4cWI5RWFDMEJtb09cL0cwcExCTHphYWdGMmhyMnRnSWpYTW5vUWYzcHdRbWJ1SStGZVVoaDhrMTNUc1h1NHNnSlkyN3pHdW8xUEVPeG1aVkFqS2Zzck9sUXJGYlE2YTlMRHFDRFA5MmtraURqUDQySnBhdlVOU1cyRXd0K2xQbzRrZUpGelgyY2FoU3JiTmhqZTkwanJQcStPSFZwNld3Y2dkNWdKMUhuaTkrRzdwb2NzSGRYZnA3OWhBWVFIZkVqcW5wd2xDMjBrTSt0Nk1cL0pPUzRlMmJYWjFnY2N5YmhWS3VYbVwvMmZqN2huU1k1bVh6dXJLNFwvMlZOVVlOekIrTVwvQlJPaFhYTEpzY1o4bHIzRHpndGFCRW1xb3FuQXFwUzZOSXJ6cmxCUDBLdGhOVWhWZFF2S2N2aEdzUlRSMDBkSE9zYVJMQlpQOXpFSVVaRENmZWwyY1VyTVU5Tk8xcmJJUXpDQVVjbzBaXC93d1ZBZExMMUwwdHVOQ3p5dUdJd2dEUkZVYnZGN2hpZUFkM1B3WTJJRGtwcEliRnlYQ3g1dlZEeVptZTRMcmhKaG5FTGE4eEVUUWpwTHlsaFJsQ0p0VGR3QmtaYjJXcWVpdlNSVUE5MVRxbjdQSlk1OEt2S2NxOVozcm44ZHhWTmRVcUttY3BXdWZIOHdJc3h1a1lxTkdGeFwvQWVqODgxMGg3UjJnd2haS3NaUDZPWmV5WjJYcGNCK0xxcW55Wk5zTXp0QlFLZ2ZmZ1RKOWdLN0F0T0NOQ3FweHlnTHQ5ZVF2ZE5CaXZoRUYzbTRsZWg1UHFvT1ZRKzRMSmhwejhjd2ZiRnJxWExmelpwSVdOaGRudlJHbVJVZytQM1pcL0dYZTNpaHpZWVVUQkx0WDVVVisyNXFIeFczcGc1Nmc1aHB4cFpnNWlIU1dwb0FvZzQ2T0N0dm0ycHdkMDBcL1ZQdDZBbFlHdk1kSlBEVXFvalNEd25uYWtrNGZScEcxRWlDRXFNMWFpNUNySnJleUpFOVorTElLRWxhT3ljSjVaR01sR2pVXC85TERUaTZYVWdzXC9GdWhlUitvdnZlelpwV0x2dEhYdWk5MElTbEdcL01aeHhPM3dlTWFLUFZUQVNIbVFlalE3TlwvdjZreDNqcHZSWTNiYUpEdTNxWXZvWmJyS0xWSlJQUFpCZEZnQmFtRG8yckEzVlZKdHRwcGdiTTFBWUZ1WDBpd1JSaHRBWWxJcnRTOTFPajFSb0crZGpWNXpvazMzXC9KbHhlM0g2d1dGQXRXOFcyNkhsNUJuZ0ZPQ28zaUlnVE53bnYrcHl5VmZBd25lN25tR3pPNWpNZlV1aTVcL1pvU2Mwajl6Vm54Y0pEZmdjT0pLZERrQmtRWFRmRFBzc253WFMwU1JablFWZDg2VFF4aERwV215THZkbzhzTzNHRFdneVU0SmREbzhUaUlkdk5KejZPSFZXZUE1TVVXR3VnaEVqRXgxMTdZYVJ3YVwvOHAyTUdHTnlpRk1vZ0kzQzZRcVJTT01BTld1OGV1NHBuOWF2a091amhjaHJtdjRYY1V2aU93THNqN1lpNTZTSyt6eTREWXlhdGl4ZWMyUXg3d2tLaGxJQ0F0ejJEXC96anp3bFMzeTlDK0ZjckM5YllFXC9ScmJKWVdRUmhGQ3hqR0IzNUd1ZlVWSDZpeUNrckdORjFOZGlDamhlOXdpSFV4SEZaMWhyRVRxMVhTSlY0MnM3UFI2SG1FdDB5cmUrblVHQkJZNGlkMURHM0hJeEJPOHdHK015dHdHWkNNYXF3T1hKeUZac2J1Q2hEbVdFZHNPcFBGanFtNGFnaTZZeDJZM3FVTk9XbDNma2xJVEVXSjljb1BzWWx2Z0M1ZVJWcWhhWUR5UlZiUnpvMGxRS0FCdmtzZ3hNblwvcnZEQytVMDFHKytrWCt2VE04akNrUmorYjVRXC81VkR0Z2xtZnZCcm9PN3B1UVdoeU5MT2x0c2c1MDFsWVVMVkFWN1lGS1dFY2hFOEI4VHNNOVFGenJqbXg4NHVEWlVVVzRpVjZ4Tll2XC8rUVRsYXdRSUlyOUdkTHU0UU5uU2s1UFl4VStRandaK0Y3bExvajRLUGF3NEVwR3BxU3o0bFp6QlI1Wk9PazAzYW93WE81N0RNamliQVZcL2NkWFwvYUdCaENKaURDSnQ2bjBDa0NMbFZxMzd5UnZuNlRFbGVRMENJMlVHbE5pa1g2dHVvQVR4cG9OYUlcLyt6SDVGNFVISVJtSDkra3h2OTFHTitLc2VxRWE3MGpNcWZhNHFHTFR0STlIT1lcL0ZjdHJPM1dMdDltRVNiNnE4c1NpelpaOTNyYkNlMDFSWEwyVVBHa29JK1RNUUhcL2l4NDRhdm82UDJHR2ZjTHFxakppbWI4eU9wRHJGd0s5RGFcL0hVc3FEZ21WRGZUcWVyaXJudnBvQUFPcjR4T3RGOTVzaEl4djdtS0VsR1pqdHpzVTNnNEUzcG9ubWtcL2xwcno4NklvMFJZeWQrQ2V4czlHVnVMXC9jT0k0SzJtN3UxTndPTG1ISVdcL0dUVXlHaXJCbEJ2UUhaQnRBYVBWNUQxdU5hbDV3Z2toVjlmRXpXYXNmUG1ObEhmbFlFcTNqQmJ2WFRWZVhVQUF0bCtxdHdOakE5OFM1QTA0NDFsXC9xVE5WMEZRYjZKNHdDSXh2RU9KN3k1UURrZWVjVlRDZkhrWk9TU2ZzZW9td2RuRHVNSUJINk5Sdmp4OHVSQVFtWTRmU28weFh2NTg2M2Y4Q2hrUXIySDlqNERcL3RUQUpPNlB2MkxzWGRWczg4R0QzSnRzR1dyQThRdGxsZTgrdnVHZDJXWWhsYWJBamJTZmJcL213eW1LczNpdFwvMHRNalE3OWRWMU1xMGdFUnUzTk12YTkyVGcySkFqVGNTTFlBc2YwS3Y3WU4zR1pFeUZhTXZtUElXS2lidjRHRGN2WWk3THRqcFwvR3pFbHdzT0hqSVJIY3ZzQmhTaXVtRFU0UkVXWlZPOGUrYmxtZVNqdkFGT08yZ0pBT1hKZEtoTWRoemxaQmpRdE5WNWFGV283eTh3OFJyeFwvcW0xQ252dFVVTlVLRDJIQlVDMTRcL1wvOVFoWHBlTEJKb2NOTXJJa1VZVnVEZUFzK3BDV2tNR3FjNU9uZ25udWxXZDhGdDQ3bTNKa0l3VEkzcVgzR2w4OWtpdllud1NsRVVadVE0dDlQejlLU2FTQklpZG5wM2phTE1GTUxka2FEVFNcL1JCRG82RzBlTVBYdnVjRUJCWEtuVDJDVW85MmV0RWRkSk94SGxGTEJ4cTdaalhZNDlTWkpMWm5VUVwvOHo4a1VZbzJUWjRDMWtockpZT3l6OXllUnV2eVNRTkgydTZ4TWdoTjhZQ3N4ZFhaclJCY2IwSWFvalwvY0V1T1k0RCtOd1V2UjAyT3A1dzRqZFRHam1mYkRJbldXZlNScTAwMFduN3RlOGg4QXNXNVl2STg0c2dFc3haYVhWVXN3NXVZSGxcL25CVTR6QjZham01ejhTOFIwVEM0cVhLNm1cL3dZdVRkNzd3Yjk4N3hPVjZyakRuNnZxaHBSUXY2SXVjUDJZRkFXQjlvM3ltUEtYT09yZHF5MHNjaEpNYzBrWXRnXC9CdlFEZHc0Y3F4NnhrbmwwZE03dU1oN1I5UGk4ZWM3ampNKzhEUEl3eVowSkhkOGJRNGZWMmQxQ3o4Wk9PcmE5WWk0cWwyTHhQYUFmbGkrQWh3Q09rWmYyQkR5b1ZRYTRBRUZodTdPSllFSTY2amxrZGxlckhcL3oxaEs2c3MwMjNMSWR0ODkzZTdqK0diY0FUV0ZjakNIcjM3cTFWQ2V1NldmNUF5RXBHT0RCNHVPSW16Rk5jVXM5NHJlbVB0VElYZVEzRTVFUmFNZDY2bHZKQk1hUGVMb3hHaDJValFpcm1DaWhKT2ZQTHRJMUk5Qm5Lbll2Q3RHa1pKRnMzRHpHKzAxXC9RQlVGekxhWXFRUU5MRk9sb0dYaFlkMjlPKzBtM0U0bTI1bUxKYnVLUnd2VWVORThwc0tDRElkNjljeEVQZ2R0Z2NLR0laU1RTWlg5anRtNW15b0RHeXE3bDUyMVNlejZUdlwvRFJhV05KWEl3dldqUE1mSzhRUml5YStMZUFKVGVGckxXcDJFNm5EMTZ1enpneHBmeUd1WDRxelRZSWI5RFFlQzNPT3B1c2hRSVwvMUJtdmJ1TStZKzRwSWhVYUFYakdiRjBsVEZucUExUU14bVB6MEYyN1RGRmJ1WXh5cGp1Z0xoTGlGQXk1ZjdVUmladkQ5UExzRnlzSHo5aG4yNWVFem5YRzdBbVhwTDNnODBJa2k3a1dzdjVzdjJRVnJqT254Yk95amdFdG40RFVaSVJJXC9oeE1VNWFpNlowcUhcL0Erb3NheHZXdG51QndVSGNHN3JjZXplRVg5TmcyU0ZBOVhoWVdxeU9tbDhoU29JZW9UaDJaNTEzdURqREZJdSs4Vlo2S011dTJJMXN4YUlcL3NWU1lZYmN4MWRaUW5CT3FseFhiSFZOS3ZrdmVXQVJvRmxHcWZjVTlTeUxaVUtGSGV0RGgxOU9sZFZoT1RNdjFvOE5uZjlPdUV6QkRTeU1iOCtcLzNhbWQ4MFcwQWg1OVFNZjB3N3J4NmZiOXliVjJpS0sxM3lzNHBySFB3ZWZSY1M1OU82QkdBMmdRUWcyUjFOenBXaWNCYnI5bjBObUh2QWMwcUlTM09yd20relJITTlwM0w0bERaMWFwb0NBOXNWNGc0aUhzenpwajFXOVRhaWV3WCtEK0p6UWt0RVY2OW4xUlZ6WGpCQzJlSVZXSzZPWk04eUJMajlOKzRJOUZNVG9JNnNNVVlDa2JRa3RwK0g2c1NleWgxRnJBcmVBVkVHMDQ4Tlc2OVpkd1FMWWtwcjZSXC9cL3Yxd2tQZkZlK2dXMlNuYVJDS0ZuOWVHc3hDODV5czhsTm85NzJJaGVUbm9nNGR1ajdNcFpMWmoraHRyNStDXC9MVnJ3SEo0Sm1LODc1SFkwbFhCSkpkSmFCSklyeStTUlVzRGJ0bXRNY0x4MTlFSFwvOVJHa0h4OHpzTVk4MUwxdUpyXC9XdDNMV2RJaWc0a0hBVkxSbUVZb1poZXV2bXA1THZLRWtYRURFWXp5VFlzdDR0azljWm1WMVVMZ2ZEaXdxMHJnQVF4dXBidnp3aG9GZnNZbk1qbDBlUlVIQ0JkREhoQmlXOEZBQ3hpazBOWUd1Rnh6ZlQwOUJ0MHg0MXdOZmhDTktpYWtLSUNGVFg3cDZvK0JveWptK0xDeUtvbjBrbUw0aUJHUG5TZElZM00rYVc5V0Vxa2ZuXC9wbGdvckNYNFdXRE5kQlwvT3ptNUJWTWZreDdZYnZWZEpYZlJhRitWb0dFeGVZNnhVdHFEWGtMbSswNHlpNmc1MzNUWDcweERRdVwva1I4R0FuSXlBZzJmaVJrT0I0Y1ZDeG1nbWlEdXJ2aGIxaFwvcENucGdNVm13WWVUc3dPMmVCQVV2QU54S0RtdmxSdkNvV0ZyeDZyWWN2Z3VFRjJUZytiWFdZcnhBditFWnkxM1NQWHpwamw0WnBtb3ZJdWZwK3VFQnBSYUsySTdtUTJWNWlqRVRuSFhubXI2QU1DWFdRWHdqU2Q3cUJyd1ZjaUhnYmMxanJsdFNaTFwvSGxPdUNHYUIyYVFRWTRYWHlDSzJ0RGIzQ2ZlYWRkeUJuQ1JGdWdueFhyd0J3U1FjTXVzNTJkNkxMaTZcL0k2NE9WblhjT0RoN21UREtYS3czT2xBaDFSdzhFQ2hkVEU4ckhtcGtPdHJyblR2MkNcL1Y4NVRXRXlcLzg3dzErWStyOXh3a0hzdVlvelpWREZTazZqRVF4N21iQmNqZmpRaTFUNzI2MWtcL1wvYVdkd1IxcDE4Z3JyU2V0em5CUXVodHE4aHVXQ0FVS3A1VVNEc3RBdmhZTWpMXC9OOEU1anFzVGVzXC9RMVpQQnUycXNRc1pcL29DRVZiOER4d0x5V1RyTXAzRytIeGc2NlRvS1wvMWZmcU84M0J2XC9zTVhGZTRYUVFpQVpsUWJsMGZDbk8yTlgxb0lLenFIcVNtdHJPTGxcL0NYRWNhZHNkTTZKUHV1WER0V3FlNGppVkpBTGxIM1cwcDhQVFdZQjZtUzQ2MTR6QmxrNTM4T3dUdUdBME8xRkV3ZlVKZ215bnFaUzR5QlQzcEl1S0N4d1lXakNqNStlM054SFpEMklTTEx0bU1FM0J4ZkRlY2IwR08yXC9hTTJWanR3eEFBTVRwckluVm5VU1NjZ0ljOEhzMEdxQkN0eW43U2pUTURBUklGaGNKY3hSRXpyamZFbUU2RWV0TEt0QU1NVmMxWGRWM09OYyt6QXhcL2FxRmdYXC9ScEFUWHN5Vjg1cThNcW5OcTRnK1R0dHpIQnl5bndDMXhJTjNtOW5OWmNJV0RBbWR4OXlpN0p1MVZpdWdcL0NxVVRiYnRQdXIwOVZ3cWozdWVWVW5tWHdoUHllUU1zY1MzTVZUdlhSanhyRnNiK3BQK1JBZU85XC9HbkM3UUhHSFR2dXBWc1doTkRCcm5pSXhWV0lcLzRpWnYwVW1qcXRnUDRNSytGOElxODR4cTdLangyY0p3bk1BbnR2TWJrMjFNSU9mKzZobEdscTFlaG9oWk9VQWtYenoxNENBeDI4eVZnOFRXZ2FNazR5Q3E4MVR3TlwvbTk2UTZ3OXhzU3NKNlI4elQzNW95NkJseDFDSzB2am4rQktaeng5emJYaEZ6QnBMeTcycmVvQ1h5dzVYMXlMQWFFYUYyWW81RjQyVWZNUnE0M3phRThvYlRxRWltRWZKM25qcmRkbVJGRGlLRWNHV2NuOVwvZEloUW9GNnFqQUlrZHY1cjJzTTIxZkx5STcxTWlHQjRmQTdyeWJ6Rys5dVlMSUp4ZDhUNzBsVE5lY2FEcjMwWXNlcGVvdnV5MkUyOSthUzh1dHpQZW5HcFwvQ1dHSDhSdnBuNWFTcFZQS2tzRDlBbjZONnRJTlwvZ1RlMVd0ZVl5Rkc2ZkRlTXNcL2tEcGVXSER4dWxrWXpDaEY2cFhkcjd1dHFxOERaVW90SmlSZ0UrYW5tZjk5R0JvMVBwUkhZbVltb3luYlI4aWF3WFlBVkZZN0JkcTVzaE8zcjRRMUVCcVdjYVY0dUcreHViSWF5aDdKdjZ0ekpZcDFDY3ZITWx3WlFsdjV4aDdlY3dsZzJxeFlWamhhREF1dm9CeFJYMUQ0RlVyZEdwbk5QUDBjZndKdDhEV1RpaSs1dDFibWFOaEZWc2ROMGhoa0dVXC9QeVQ3SkRwamNZZCtLTkdTM21nc2JnUm5VckRmQ0o2NnZaRkpjUGlCNFc0S2lTaER0VmJ5UklPVXllcUxmYUN0YjdWXC9paHVwTXY5b3V4RWtaczZLTGw2VkhxRDdcL3IyeE02cmNKUFwvS0xwQUhaTzBmQ0t4SmJxTThjQ3ptbHJIRldBaHFEQk1YKzBaXC90UWNQbFZIWDlERkl5Qzk1Mmx0aGp6UTB3cHYrNzFJMHppVkZtZStcL0FjN2hNUk1QbFkxNjRvUTh6TTRJUTI1aXNTWk5USUdDTGducUk4M1BMZ2VqRVNkUEdiUVY2WEU2VWExellKM01TRXVWWDVTdXFVbWpjOWpRXC9zWFo5elVxa2o0UU5NaU9QVEZiciszQUE4OEFuMTlYUDI0YmRyOXlOSjRsNVJqVkxickRPNmpvWjJlaFdCZ2xReEJHOGh0OTdDUnZYUjA2YzF0VVltXC9pZGtIbVQ1Z1c3bUkzUUtIYUtYa3duZ0NUU3FYek9CeTAyYml2c1IrZm5wSzZQcjF5eTl6WXBkZ0pzUnFrOGRDWEM2NmpZT1hCSURJWmNzaVB5aHM4K1hiTEJKMXVhSnpiSlZrXC9sZDdESTQ0Zm9PbnFXVnpIMWFnTFE3eVpkZkZQU1JvalRkajBBSGdyaVZtbDBsVXo5QUszUjU3MnlBZys2UXc3UVN1YmxYZ3VKc1BKZ0VwMVZoYzZoK2lHaFBKODhCRHRlU1BKUG5tZVo0UTVsRGNNa1d3MWs0alk1dHlSaENIcThsd0RuV05mODJnVkRad2pZRzBlZHU4SWFtWU5jYXByTFwvZVwvUW1QT3FaVEgzMDdtNW9XMWdaRllQVk5LYWhGN0dQSVFlTFp0Z2FrZTNJVlwvYjZsM0VwZXg3TjNTUmJWanBjRW5ZSDBiSmlOWW54am9OWUpEbFlvQVwvOFRMYWNEcmRjdjZmS2hIQnlnUUhTOUYrVHhvUjErYWg1NllkcEFGb1JZeEFCajk0enA1ejhXeUNoNVZZSmtmXC9Oa3hJck1oa3RxK0F1bndtWjlBNm0yaVBcL1hrV0x4KzBcL3YzcVFWVDV2UXFwc1BSTXpDcyswaGU5YVFheDg0bnVZbUtkODFOaTRsMzg4SWRcL3Q4K2JhUG9Qc2U0azJ3b056dmF2ejZBd0VqUFwvYkM2TnY4NG5GSjBOVGM2cWpLUUJtZUtrV3Q5TUh5dVdyNG44SWNOTlliNEdYOVNpWU8xV2NRVVp0Wk9cL09xR0FzUTZFc1lrbTNDaGt6NHJ1MnRYbXpVNEtiWEZkZUVnb1MxeDcwVHl4dkREb3A3ZmFSV2pWcmNEYVdrdnpNbm9lMDlQdlowM1psMHlzdk9GbFZjYjBuXC80aE1BMDZxeDF5NUI3NkY1OCs2WEJUeG9nTHNRMmhNbEJWa0drKzZidk0yc0llUXNvNGp1WlJ5alZqNkZZMDRvQzN3blJsbWNPc0VPMEo5UHZUUEhCZ0RSbHhnR3hzMWY0djdaXC8zdkowYmR6bTg0MThSdHNCbVZ4MU1mS3NqcmtRMjJBTEt2XC9JQStWeHdZXC9QSUdFQkpZXC8rd2N6Q012b0NoQllRY0dFVVZzWlwvN1FwTFRjTzBTdUoxZnI1SSt2YnhUeEJ5MG8wWVNuU3VyNWh4cEliTVhLeStVbGtBb2JERUlScDdGTHowOWFuaXFqU0ZzbXVqdlQ1YXY0eG5PV0FSQ01GTjdmalp2WHphWkFxN2pxWHlEcmlCS2tpdFQxRmFtRSt2Z0tSYVdhSis2c0lZY3MwVjVjREcyenFmNnFFN1l5SEpXOGhzemxEUXd2WGZuUzdkeUQxZlozMnE1TmVLQjMrWFh5XC84Tk5BWUZKZ1VybkQzYStYelF5SG93U3RiaGFwcXlpY1BjUWVwRnBiT0FOZzJCZXFhWlVQYk13WFwvaWZ3TThnbWR2WmxxR0hXdm1ZZSs2ZjFRcHdFM1wvaExGZkNPSFp4ajFIWmp6MW44TGRITk5WT2I3TGZZRTRuYU5XdUsyckdqNVdhMWdnZjhQandlSTNDcGwxWlBzXC9Wbjg3RWZcLzU1TjRPRVltYk84c3BWRlRJYjQ5UDJ6VDQ0ODcxczl4N0tJUzYxaitQVUVhZ2hGTHdQK1BwWXVkYzR1TUF1aHZZM0lvM2EyRDRIb2p2R21jWUdtQURPV2UyenhBTTFHSHdcL1NTYWZzZk1KdnpOUXl3NlFwYTNNeGYxakc3Q2oxMEk5VTdxK0N3dkV0eFRKR28wRDdPWnhHOWhZOE02dHh1YWJGY0RabXRaSGhHa205NEFKdXB5MDRcL3Mra1ArT1ZRMEVjRjNLaDFGYnpCa2F2ZVdIejlaaFJZUlRWM1BRWDZhVU9qOFk1K3NKMVBuVWJ4dDZ0R0Z5TlJVNkxaSU1CUUxrUHYxV0hnN3Bsb1B6cDdFVEEzK213V3E3ajAxZkdVTU44d2poQXQ5RmpMV1wvU1ZHZG9IU0Z6YnpXd2grXC9WVXdoc2VlSFAxUDZoemowYm0yUEo0MlZpUUFpQ1g3VHhrVFNDd0JNK1NIMUlCWk5YbXBWdlk2N2NUZ1ZHZ2FTK3FFTHduZElLZzZvcVdMS0xaTVZzU3pzNlErQW54YkNTdXY5TWp0NUFmU3BvOEo4aWFhQlJmU1E4Y3h1dEJuWHFyTkRFb0cxWlNkakFpNWhDV0lYeFVBMW1NYmFiK1FRSzdWNVRwTElqZ3BkTDhVdXFJc2Y5OGpxUEtDeXlCUDZPXC9EV1ZkXC9taWZsWTZWWXM0K0pyZ1RROTJXdjJpSFUyZlwvaW5HT1RGNGd6ZlQ3VmxWVTlcL3E1M1hyZUc5WEJKelZCRmRqYTJMXC9SRnM3UHh3Vzg4cENwTUhRUWdGYklzUzV5aGVheGlOb0J6RkZSaldPTEphTG5tYUs5RGhyakl4UkkwKzhOVHZXb3hIZTBwaHF4YWtscTdWcHViRGlDaUpkUDNSaXdMb2tPWVFsbUJEVDRuRHM5ck4yZzkyRU1VTEFCWncrY2xqVVpMY0FJTDZ6Y3ZObWkwMmV6UlRtZTljT1d0elBHenNqTGJOQk1id1NvT2lzdncyUjN2MTRjeTZaajdHV3VaS3RUVFJLT1R0S3lCalpVc1dub1wvdlNWMnZ5eFhqZlwvRHNzaHh4NnZNbUkraUgxdVY0MmVtbWxXdHpraEo0cGdibm5FYmZKVHUxRE0yNTFwWFgrRmNLOThXMEpQOVUzOWRTd3J6dVdmZzM3emE5NzRmMllkSCtrajZ0MzJSSDVKVXBSQXFQaWNwMStoVlgzME9kQkJEeUdKUWdRZGZDXC8rdHpmdGt5cEhkeHdWMU1NQVVSVWNqN1RMUHJUK3BFMm1wMnA3YVpOTThkcHFIYWdwTGFtejZiNHQ2b09mQ0hYUmQ0TGwzYjZGUVo4KzYyTXlWNjRVNTMxQ3NERkU0cU9kVytvakFWODIrOXlTMDRPMHcrQU9sdEFXdTF6XC83ekN1NFVLem5xWElKRlpcL25Gd3FiRU1UeFJlYW1vS0hOOEpRS0FxSmQrbDR5XC9NdzVZOHNxcTJWeWxNZDdXKys4c2wrQkd2YWg1TXpRcVlQZm5od0FqelpMWmthcWFMQlVOaDRKN0hCZjVaUncyckRIa0NkNzd4VUNnUVdnd2Y4dlwvN0RaSWZXMTFmaEhIaDBKY0U3MCtHRDMxSlVBN292OTQ5Nmp4SXNRXC9sVHV4Rng5VDJhczJQSVVqa1ZrKzRNNE02TUwzK0xLRWRSRlpGY0lUMkRRa3dcL2YySFdBQVVsOThxcFpydGN4UTFtXC9ubGxnbm1FTDI5Y1V2aTVPXC9na0w4NGp1NVwvRUlOcmY5RDNNclRzdEk1bnNXbTRPUFNEYndaeXFZTzlWMSs3VDBrOERNaDRcL3hLIiwibWFjIjoiZTQ5YzAzYWVmNDFlNzEzOGQ2ZTU1ZWY4NjgzYjQ4NWVhM2ZkOTZiMTBhNzM1Nzk0ODA2MjIxZDQwNGE4MjRmOCJ9','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `nova_cache` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nova_depts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_depts`;

CREATE TABLE `nova_depts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nova_depts` WRITE;
/*!40000 ALTER TABLE `nova_depts` DISABLE KEYS */;

INSERT INTO `nova_depts` (`id`, `title`, `created_at`, `updated_at`)
VALUES
	(1,'Marketing','2017-02-14 19:45:45','2017-02-16 19:16:22');

/*!40000 ALTER TABLE `nova_depts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nova_global_blocks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_global_blocks`;

CREATE TABLE `nova_global_blocks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `nova_global_blocks` WRITE;
/*!40000 ALTER TABLE `nova_global_blocks` DISABLE KEYS */;

INSERT INTO `nova_global_blocks` (`id`, `title`, `type`, `content`)
VALUES
	(1,'Phone Number','input','123456'),
	(3,'Header Nav','input','[main-menu]'),
	(4,'Footer','textarea','<p>Some footer notice....</p>\r\n');

/*!40000 ALTER TABLE `nova_global_blocks` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nova_menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_menus`;

CREATE TABLE `nova_menus` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `tag` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `content` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `nova_menus` WRITE;
/*!40000 ALTER TABLE `nova_menus` DISABLE KEYS */;

INSERT INTO `nova_menus` (`id`, `title`, `tag`, `type`, `content`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Main Menu','[main-menu]','Bootstrap','[{\"slug\":\"/\",\"title\":\"Home\",\"id\":1496591316017},{\"slug\":\"/about\",\"title\":\"About\",\"id\":1496591316021},{\"slug\":\"/servies\",\"title\":\"Servies\",\"id\":1496591316028},{\"slug\":\"/contact\",\"title\":\"Contact\",\"id\":1496591316024}]','2016-10-15 12:12:15','2017-06-04 17:25:49',NULL),
	(2,'test','[test]','Bootstrap','[]','2017-06-04 17:24:09','2017-06-04 17:24:23','2017-06-04 17:24:23');

/*!40000 ALTER TABLE `nova_menus` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nova_notifications
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_notifications`;

CREATE TABLE `nova_notifications` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `assignedTo` int(11) DEFAULT NULL,
  `assignedFrom` int(11) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `seen` varchar(255) DEFAULT 'No',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table nova_options
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_options`;

CREATE TABLE `nova_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` varchar(100) NOT NULL,
  `item` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nova_options` WRITE;
/*!40000 ALTER TABLE `nova_options` DISABLE KEYS */;

INSERT INTO `nova_options` (`id`, `group`, `item`, `value`)
VALUES
	(1,'app','name','Nova CMS'),
	(2,'app','color_scheme','blue'),
	(3,'mail','driver','sendmail'),
	(4,'mail','host','http://smtp.mailtrap.io'),
	(5,'mail','port','465'),
	(6,'mail','from.address','dave@daveismyname.com'),
	(7,'mail','from.name','The Nova Staff'),
	(8,'mail','encryption','ssl'),
	(9,'mail','username','a255bed9446c15'),
	(10,'mail','password','ad2a014c623fe6'),
	(11,'app','ipAccessList','[]'),
	(12,'app','devEmails','{\"dave@daveismyname.com\":\"David Carr\"}');

/*!40000 ALTER TABLE `nova_options` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nova_page_blocks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_page_blocks`;

CREATE TABLE `nova_page_blocks` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pageID` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table nova_page_revisions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_page_revisions`;

CREATE TABLE `nova_page_revisions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pageID` int(11) DEFAULT NULL,
  `content` text,
  `addedBy` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `nova_page_revisions` WRITE;
/*!40000 ALTER TABLE `nova_page_revisions` DISABLE KEYS */;

INSERT INTO `nova_page_revisions` (`id`, `pageID`, `content`, `addedBy`, `created_at`)
VALUES
	(1,9,'<p>the services page</p>\r\n',9,'2017-06-04 16:32:53');

/*!40000 ALTER TABLE `nova_page_revisions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nova_pages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_pages`;

CREATE TABLE `nova_pages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `browserTitle` varchar(255) DEFAULT NULL,
  `pageTitle` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `metaDescription` text,
  `active` varchar(3) DEFAULT 'Yes',
  `content` text,
  `publishedDate` datetime DEFAULT NULL,
  `layout` varchar(255) DEFAULT 'default',
  `sidebars` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `nova_pages` WRITE;
/*!40000 ALTER TABLE `nova_pages` DISABLE KEYS */;

INSERT INTO `nova_pages` (`id`, `browserTitle`, `pageTitle`, `slug`, `metaDescription`, `active`, `content`, `publishedDate`, `layout`, `sidebars`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Home','Home',NULL,'','Yes','<p>Hello.</p>\r\n','2016-08-01 09:00:00','Default',NULL,'2016-08-01 20:11:24','2017-06-04 16:27:11',NULL),
	(2,'About Page','About','about','','Yes','<p>About</p>\r\n','2016-08-01 09:00:00','Default','1','2016-08-01 20:11:24','2017-06-04 11:24:06',NULL),
	(8,'Contact','Contact','contact',NULL,'Yes','content','2016-08-03 10:00:00','default',NULL,'2016-08-03 18:20:43','2016-08-03 18:38:45',NULL),
	(9,'Services','Servies','servies','the services page','Yes','<p>the services page</p>\r\n','2017-06-04 16:29:22','Default',NULL,'2017-06-04 16:31:28','2017-06-04 16:33:03',NULL);

/*!40000 ALTER TABLE `nova_pages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nova_password_reminders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_password_reminders`;

CREATE TABLE `nova_password_reminders` (
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `email` (`email`),
  KEY `token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table nova_roles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_roles`;

CREATE TABLE `nova_roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(40) CHARACTER SET utf8 NOT NULL,
  `slug` varchar(40) CHARACTER SET utf8 NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `nova_roles` WRITE;
/*!40000 ALTER TABLE `nova_roles` DISABLE KEYS */;

INSERT INTO `nova_roles` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'Administrator','administrator','Full access','2016-06-05 01:48:00','2016-06-05 01:48:00',NULL),
	(2,'User','user','A standard user','2016-06-05 01:48:00','2016-06-05 01:48:00',NULL);

/*!40000 ALTER TABLE `nova_roles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nova_sessions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_sessions`;

CREATE TABLE `nova_sessions` (
  `id` varchar(255) NOT NULL,
  `payload` text NOT NULL,
  `last_activity` int(11) unsigned NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nova_sessions` WRITE;
/*!40000 ALTER TABLE `nova_sessions` DISABLE KEYS */;

INSERT INTO `nova_sessions` (`id`, `payload`, `last_activity`)
VALUES
	('5c6340d13cbab33a429dc81c21464b11ec4d524e','YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTWI2bEM2RG9XdG5VcDRKREsxSW8yTWxyZE9MSG5kRnVscklUZlVyNiI7czo4OiJsYW5ndWFnZSI7czoyOiJlbiI7czo1OiJmbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjk6Il9zZjJfbWV0YSI7YTozOntzOjE6InUiO2k6MTQ4ODk2Mjg5ODtzOjE6ImMiO2k6MTQ4ODk2Mjg3MTtzOjE6ImwiO3M6MToiMCI7fX0=',1488962898);

/*!40000 ALTER TABLE `nova_sessions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nova_sidebars
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_sidebars`;

CREATE TABLE `nova_sidebars` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `displayTitle` varchar(2) DEFAULT 'on',
  `content` text,
  `position` varchar(255) DEFAULT NULL,
  `class` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `nova_sidebars` WRITE;
/*!40000 ALTER TABLE `nova_sidebars` DISABLE KEYS */;

INSERT INTO `nova_sidebars` (`id`, `title`, `displayTitle`, `content`, `position`, `class`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(1,'test','on','<p>test</p>\r\n','Left','','2017-02-12 21:58:48','2017-06-04 10:53:26',NULL);

/*!40000 ALTER TABLE `nova_sidebars` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nova_user_logs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_user_logs`;

CREATE TABLE `nova_user_logs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL DEFAULT '',
  `link` varchar(255) NOT NULL DEFAULT '',
  `refID` int(11) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT 'View',
  `source` varchar(255) DEFAULT 'View',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nova_user_logs` WRITE;
/*!40000 ALTER TABLE `nova_user_logs` DISABLE KEYS */;

INSERT INTO `nova_user_logs` (`id`, `user_id`, `title`, `link`, `refID`, `section`, `type`, `source`, `created_at`, `updated_at`)
VALUES
	(1,9,'Logged in.','',9,'users','Auth','View','2017-06-02 14:51:04','2017-06-02 14:51:04'),
	(2,9,'Updated dept: Marketing.','admin/depts/1/edit',1,'depts','Update','View','2017-06-02 15:01:45','2017-06-02 15:01:45'),
	(3,9,'Updated page: About.','admin/pages/2/edit',2,'pages','Create','View','2017-06-02 15:03:01','2017-06-02 15:03:01'),
	(4,9,'Updated Sidebar: test.','admin/sidebars/1/edit',1,'sidebars','Update','View','2017-06-02 15:03:07','2017-06-02 15:03:07'),
	(5,9,'Updated user: admin','admin/users/9/edit',9,'users','Update','View','2017-06-02 15:11:30','2017-06-02 15:11:30'),
	(6,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-02 15:28:03','2017-06-02 15:28:03'),
	(7,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-02 15:28:18','2017-06-02 15:28:18'),
	(8,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-02 15:37:03','2017-06-02 15:37:03'),
	(9,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-02 15:37:07','2017-06-02 15:37:07'),
	(10,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-02 15:37:11','2017-06-02 15:37:11'),
	(11,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-02 15:37:22','2017-06-02 15:37:22'),
	(12,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-02 15:37:50','2017-06-02 15:37:50'),
	(13,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-02 15:41:11','2017-06-02 15:41:11'),
	(14,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-02 15:46:36','2017-06-02 15:46:36'),
	(15,9,'Logged out.','',9,'users','Auth','View','2017-06-03 12:45:05','2017-06-03 12:45:05'),
	(16,9,'Logged in.','',9,'users','Auth','View','2017-06-03 13:02:41','2017-06-03 13:02:41'),
	(17,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 13:21:00','2017-06-03 13:21:00'),
	(18,9,'Logged out.','',9,'users','Auth','View','2017-06-03 13:21:13','2017-06-03 13:21:13'),
	(19,9,'Logged in.','',9,'users','Auth','View','2017-06-03 13:21:17','2017-06-03 13:21:17'),
	(20,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 13:29:30','2017-06-03 13:29:30'),
	(21,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 13:30:15','2017-06-03 13:30:15'),
	(22,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 13:31:11','2017-06-03 13:31:11'),
	(23,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 13:32:22','2017-06-03 13:32:22'),
	(24,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 13:33:17','2017-06-03 13:33:17'),
	(25,9,'Updated user: admin','admin/users/9/edit',9,'users','Update','View','2017-06-03 14:08:41','2017-06-03 14:08:41'),
	(26,9,'Updated user: admin','admin/users/9/edit',9,'users','Update','View','2017-06-03 14:15:31','2017-06-03 14:15:31'),
	(27,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 18:00:44','2017-06-03 18:00:44'),
	(28,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 18:00:55','2017-06-03 18:00:55'),
	(29,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 18:33:40','2017-06-03 18:33:40'),
	(30,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 18:33:44','2017-06-03 18:33:44'),
	(31,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 18:34:58','2017-06-03 18:34:58'),
	(32,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 18:35:03','2017-06-03 18:35:03'),
	(33,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 18:35:24','2017-06-03 18:35:24'),
	(34,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 18:35:35','2017-06-03 18:35:35'),
	(35,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 19:06:42','2017-06-03 19:06:42'),
	(36,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 19:07:05','2017-06-03 19:07:05'),
	(37,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 19:07:09','2017-06-03 19:07:09'),
	(38,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 19:07:13','2017-06-03 19:07:13'),
	(39,9,'Updated settings','admin/settings',NULL,'settings','Update','View','2017-06-03 19:09:52','2017-06-03 19:09:52'),
	(40,9,'Created new user: demo','admin/users/10/edit',10,'users','Create','View','2017-06-03 21:04:26','2017-06-03 21:04:26'),
	(41,9,'Logged out.','',9,'users','Auth','View','2017-06-03 21:05:07','2017-06-03 21:05:07'),
	(42,10,'Logged in.','',10,'users','Auth','View','2017-06-03 21:05:18','2017-06-03 21:05:18'),
	(43,10,'Logged out.','',10,'users','Auth','View','2017-06-03 21:45:09','2017-06-03 21:45:09'),
	(44,9,'Logged in.','',9,'users','Auth','View','2017-06-03 21:45:46','2017-06-03 21:45:46'),
	(45,9,'Updated Sidebar: test.','admin/sidebars/1/edit',1,'sidebars','Update','View','2017-06-04 10:47:00','2017-06-04 10:47:00'),
	(46,9,'Updated Sidebar: test.','admin/sidebars/1/edit',1,'sidebars','Update','View','2017-06-04 10:47:07','2017-06-04 10:47:07'),
	(47,9,'Updated Sidebar: test.','admin/sidebars/1/edit',1,'sidebars','Update','View','2017-06-04 10:49:20','2017-06-04 10:49:20'),
	(48,9,'Updated Sidebar: test.','admin/sidebars/1/edit',1,'sidebars','Update','View','2017-06-04 10:53:26','2017-06-04 10:53:26'),
	(49,9,'Updated page: About.','admin/pages/2/edit',2,'pages','Create','View','2017-06-04 11:24:06','2017-06-04 11:24:06'),
	(50,9,'Updated page: Home.','admin/pages/1/edit',1,'pages','Create','View','2017-06-04 16:27:11','2017-06-04 16:27:11'),
	(51,9,'Updated page: Home.','admin/pages/1/edit',1,'pages','Create','View','2017-06-04 16:29:18','2017-06-04 16:29:18'),
	(52,9,'Created page: Servies.','admin/pages/9/edit',9,'pages','Create','View','2017-06-04 16:31:28','2017-06-04 16:31:28'),
	(53,9,'Updated page: Servies.','admin/pages/9/edit',9,'pages','Create','View','2017-06-04 16:32:36','2017-06-04 16:32:36'),
	(54,9,'Updated page: Servies.','admin/pages/9/edit',9,'pages','Create','View','2017-06-04 16:32:53','2017-06-04 16:32:53'),
	(55,9,'Created Menu: test.','admin/menus/2/edit',2,'menus','Create','View','2017-06-04 17:24:09','2017-06-04 17:24:09'),
	(56,9,'Updated Menu: test.','admin/menus/2/edit',2,'menus','Update','View','2017-06-04 17:24:14','2017-06-04 17:24:14'),
	(57,9,'Deleted Menu: test.','',2,'menus','Delete','View','2017-06-04 17:24:23','2017-06-04 17:24:23'),
	(58,9,'Updated Menu: Main Menu.','admin/menus/1/edit',1,'menus','Update','View','2017-06-04 17:25:38','2017-06-04 17:25:38'),
	(59,9,'Updated Menu: Main Menu.','admin/menus/1/edit',1,'menus','Update','View','2017-06-04 17:25:49','2017-06-04 17:25:49'),
	(60,9,'Logged out.','',9,'users','Auth','View','2017-06-04 18:28:54','2017-06-04 18:28:54'),
	(61,9,'Logged in.','',9,'users','Auth','View','2017-06-04 18:29:44','2017-06-04 18:29:44');

/*!40000 ALTER TABLE `nova_user_logs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nova_user_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_user_permissions`;

CREATE TABLE `nova_user_permissions` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `view` varchar(3) DEFAULT 'No',
  `add` varchar(3) DEFAULT 'No',
  `edit` varchar(3) DEFAULT 'No',
  `delete` varchar(3) DEFAULT 'No',
  `export` varchar(3) DEFAULT 'No',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table nova_user_permissions_list
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_user_permissions_list`;

CREATE TABLE `nova_user_permissions_list` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `nova_user_permissions_list` WRITE;
/*!40000 ALTER TABLE `nova_user_permissions_list` DISABLE KEYS */;

INSERT INTO `nova_user_permissions_list` (`id`, `title`)
VALUES
	(1,'Dashboard'),
	(2,'Depts'),
	(3,'Errors'),
	(4,'Notifications'),
	(5,'Roles'),
	(6,'Settings'),
	(7,'User Logs'),
	(8,'Users'),
	(9,'Files');

/*!40000 ALTER TABLE `nova_user_permissions_list` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table nova_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `nova_users`;

CREATE TABLE `nova_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) unsigned NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `personalEmail` varchar(255) DEFAULT NULL,
  `imagePath` varchar(255) DEFAULT 'images/users/no-image.png',
  `tel` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `jobTitle` varchar(255) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `tshirtSize` varchar(255) DEFAULT NULL,
  `nextOfKinName` varchar(255) DEFAULT NULL,
  `nextOfKinRelationship` varchar(255) DEFAULT NULL,
  `nextOfKinNumber` varchar(255) DEFAULT NULL,
  `office365Email` varchar(255) DEFAULT NULL,
  `office365Password` varchar(255) DEFAULT NULL,
  `backgroundColour` varchar(255) DEFAULT NULL,
  `textColor` varchar(255) DEFAULT NULL,
  `active` varchar(3) NOT NULL DEFAULT 'Yes',
  `officeLoginOnly` varchar(3) DEFAULT 'Yes',
  `isStaff` varchar(3) DEFAULT 'Yes',
  `forceChangePassword` varchar(3) DEFAULT 'Yes',
  `target` varchar(255) DEFAULT '0',
  `magic_token` text,
  `magic_token_created_at` timestamp NULL DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `lastLoggedIn` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `nova_users` WRITE;
/*!40000 ALTER TABLE `nova_users` DISABLE KEYS */;

INSERT INTO `nova_users` (`id`, `role_id`, `username`, `password`, `email`, `personalEmail`, `imagePath`, `tel`, `mobile`, `jobTitle`, `dept_id`, `company`, `tshirtSize`, `nextOfKinName`, `nextOfKinRelationship`, `nextOfKinNumber`, `office365Email`, `office365Password`, `backgroundColour`, `textColor`, `active`, `officeLoginOnly`, `isStaff`, `forceChangePassword`, `target`, `magic_token`, `magic_token_created_at`, `activation_code`, `remember_token`, `lastLoggedIn`, `created_at`, `updated_at`, `deleted_at`)
VALUES
	(9,1,'admin','$2y$10$beP5zwUWdrr5l5Zfait2reREN.XLGltCAObYFmhhOuA82auw9.t1W','admin@novaframework.dev','','images/users/no-image.png','','','',1,'','','','','','','','','','Yes','No','Yes','No','0','','2017-03-07 07:21:57',NULL,'ClsaHkhhRzobqgIj563O5zJoPgSZmhvXeYTBtmhLFgeGzXMGkLbm3NfVbIXP','2017-06-04 18:29:44','2016-06-03 10:15:00','2017-06-04 18:29:44',NULL);

/*!40000 ALTER TABLE `nova_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

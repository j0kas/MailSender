# TODO MailSender
* permettre le copier/coller avec un bouton avec http://zeroclipboard.org/
* Retirer les CSS contraignantes (width global et font)
* Mettre les scrollbars
* Gérer Imp et Zimbra (soit par 2 icônes soit par un div qui propose deux liens)
* Faire une description dans le README et préciser le comportement avec les mobiles
* test sur gmail, yahoo, hotmail, live, mail (apple), thunderbird
* pour une version ultérieure, creuser une solution de popup ou iframe permettant de diviser l'écran en deux avec à gauche les propositions de sujet, corps, destinataires... Et à droite la fenêtre d'édition de mail du client.
* pour une version ultérieure, ça serait chouette de se pencher sur les possibilité offertes par les APIs.

## DONE
* A NOTER DANS LE README : Problème de BCC sur hotmail.com 
* A NOTER DANS LE README : Problème de subject pour yahoo
* boutons supplémentaires vers Orange, SFR, numéricable, free, laposte...
* Ajuster la taille des fenêtres pour chaque Client mail
* SFR : https://messagerie.sfr.fr/
* Faire un répertoire img/originales/ contenant les images les plus grandes possibles
* Uniformiser les icônes (on pourra mettre le joli style enveloppe à postériori)
* utiliser  implode(",", $array);
* Phrase : "Accéder directement à votre messagerie :"
* Tester l'URL https://mail.google.com/mail/u/0/x/?&v=b&eot=1&pv=tl&cs=b trouvé là : http://stackoverflow.com/questions/6548570/url-to-compose-a-message-in-gmail-with-full-gmail-interface-and-specified-to-b#answer-22548884
--> fonctionne pas
* * voir comment ça peut se passer avec les mobiles
* Mettre un &lt;div id="ms-nom-du-client"&gt; autour de chaque &lt;a&gt;
* Trouver des stats sur l'utilisation des clients mails http://www.journaldunet.com/ebusiness/le-net/classement-services-mail/orange.shtml
* voir si on propose avant les boutons 
  * un champ textarea avec le texte proposé par défaut et que l'internaute peux modifier avant d'envoyer.
  * un champ texte limité à la Twitter et le lien et la signature du site sont ajoutées automatiquement au corps du mail
* voir les possibilités d'écrire du HTML pour chaque fournisseur, clients ce qui pourrait nous permettre d’insérer une image.
* ensuite faudra décider du format qu'on adopte (petit texte + URL)
* déterminer la longueur maximum du BODY (le minimum de tous les fournisseurs et clients mails).
* préciser si c'est avant ou après l'urlencoding.
* préciser si c'est une limitation liée à la taille de l'URL (par exemple s'il y a 50 destinataires est-ce que ça change la limite du body)

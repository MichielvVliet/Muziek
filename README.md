# Muziek
PHP pages for my music collection.
My first try at PHP and MVC.

Getting Started:

It's just PHP (minimal use of JScript and Ajax) and MySql.
See Folder MySql for database and table scripts.

Prerequisites:

- a working (W)(L)AMP server.
- add a virtualhost.  

Installing:

- Just copy files and folders.

What you should know before use:

- 	tblacl			Access Control List
	tblalbum		Albums
	tblartiest		Artists
	tblleden		Members of an Artist
	tblsessions		Session variables
	tbltrack		Tracks on an Album
	tblusers		Registered Users in conjuction with ACL

Access Control List
userId		must exist in tblusers
recht		choose from 'Artiesten', 'Albums', 'Tracks' or 'Leden'
toegewezen	this uses CRUD 
			examples	'1000' only creation
						'1100' creation and read
						'1110' creation, read and update
						'1111' creation, read, update and delete

Images of Artists are stored in the folder /assets/images/artiest/
(for the moment only jpg files are allowed)
Images of Albums are stored in the folder /assets/images/album/$artiestId/
(for the moment only jpg files are allowed)

Deployment

- 

Built With

    SublimeText 3


Acknowledgments

	Hat tip to Curtis Parham (thanks for explaining MVC and part of the code)

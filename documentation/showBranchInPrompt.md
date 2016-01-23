#Showing Git status in your prompt

When not using an IDE to use Git and making use of branching,
it becomes easy to get lost as to what branch changes are being made on.  The following
changes to your linux .bashrc file will put which branch you are modifying and include
a * if there are unstaged modifications and a + if there are staged modifications.
The prompt only shows up in directories that you have git initialized.
This should help you know what you are changing.

So, here are the steps:

1) put git-prompt.sh from http://git-prompt.sh/ into your home directory
2) read all of this section then use the following commands:
	echo 'source ~/.git-prompt.sh' >> ~/.bashrc
	echo 'GIT_PS1_SHOWDIRTYSTATE=1' >> ~/.bashrc
	echo 'PS1='"'[\u@\h \W\$(__git_ps1 "'" (%s)")]\$ ' >> ~/.bashrc

	this will overide your preferred prompt as the commands will be after what you have.
	the 3rd echo will give a prompt like:   [user@hostname directory (branch *)]$
	So, think about what you want your prompt to look like then either
	adjust the 3rd echo or edit your .bashrc file.
3) next, reload your .bashrc file as follows:
	. .bashrc
4) now cd to a git initialized directory to see the effects.

My normal prompt looks like [james] $
When I am in a Git initialized directory, my prompt looks like:
No changes or staged files:    		[james (master)] $
Modified files and no staged files:	[james (master *)] $
All modified files are staged:		[james (master +)] $
Staged files and then modified some	[james (master *+)] $

When I leaave the git initialized directory, my prompt returns to normal.
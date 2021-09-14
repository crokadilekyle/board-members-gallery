# Board Members Plugin

This is a simple WordPress plugin designed to add a board members gallery to a page or post.  It registers a custom post type of "Board Member" and creates a shortcode for adding the gallery.

To install, simply download the code and upload it to your WordPress site as a .zip file.

This plugin uses @wordpress/scripts package for using React.  Run npm install to install all required dependencies.

Once activated, a new "Board Members" menu icon will appear.  Go here to add board members.  Enter a name and a role for each board member.  Set the featured image as the photo to be displayed for the member.  The photo should be 345px wide by 440px high.

To display the gallery, use the <code>[board-members-gallery]</code> shortcode.  This will display all board members in the order they were created.


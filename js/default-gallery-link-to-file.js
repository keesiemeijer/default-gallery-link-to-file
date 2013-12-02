( function( $ ) {
	var media = wp.media;

	// Wrap the render() function to append controls
	media.view.Settings.Gallery = media.view.Settings.Gallery.extend( {
		render: function() {

			media.view.Settings.prototype.render.apply( this, arguments );
            
            // this.$el.find('select.link-to').val('file');
			this.model.set( 'link', 'file' );

		}
	} );
} )( jQuery );
( function( api ) {

	// Extends our custom "the-writers-blog" section.
	api.sectionConstructor['the-writers-blog'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
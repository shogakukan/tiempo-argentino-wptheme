const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
import {fetchRBPosts} from '../../helpers/posts/posts';
import './css/editor.css';

registerBlockType( 'ta/talleres', {
	// Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
	title: __( 'Talleres', 'ta-genosha' ), // Block title.
	icon: 'dashicons-welcome-learn-more', // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.
	category: 'ta-blocks', // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
	keywords: [
		__( 'Tiempo Argentino' ),
		__( 'Genosha' ),
		__( 'Talleres' )
	],
	// The "edit" property must be a valid function.
	edit: function() {
        const {
            post
		} = fetchRBPosts({
            'post_type': "ta_taller",
            'meta_query': [{'ta_taller_vidriera': true}]
        });
        
        return (
			<>
				<div className = { `ta-taller-block` }>
					Bloque de talleres
				</div>
			</>
        );
	},
	
	// The "save" property must be specified and must be a valid function.
	save: function( { attributes } ) {
        return null;
	},
} );

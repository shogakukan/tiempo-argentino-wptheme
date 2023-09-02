const { __ } = wp.i18n; // Import __() from wp.i18n
const { registerBlockType } = wp.blocks; // Import registerBlockType() from wp.blocks
import React, { useState, useEffect } from "react";
import { fetchTAArticles } from "../../helpers/ta-article/useTAArticles";
import "./css/editor.css";

registerBlockType("ta/fotogaleria", {
  // Block name. Block names must be string that contains a namespace prefix. Example: my-plugin/my-custom-block.
  title: __("Fotogalería", "ta-genosha"), // Block title.
  icon: "dashicons-welcome-learn-more", // Block icon from Dashicons → https://developer.wordpress.org/resource/dashicons/.
  category: "ta-blocks", // Block category — Group blocks together based on common traits E.g. common, formatting, layout widgets, embed.
  keywords: [__("Tiempo Argentino"), __("Genosha"), __("Fotogalería")],
  // The "edit" property must be a valid function.
  edit: function () {
    const [fotogalerias, setFotogalerias] = useState(null);
    if (fotogalerias === null) {
      const fetchResult = fetchTAArticles({
        //'post_type': "ta_taller",
        meta_query: [{ ta_article_special_format: 'fotogaleria' }],
      }).then(function (data) {
        console.log(data, 'nacho');
        setFotogalerias(data);
      });
    }

    return (
      <>
        <div className={`ta-fotogaleria-block`}>
          <h5>Bloque de Fotogalerías</h5>
          <div>
            {fotogalerias ? (
              fotogalerias.map((v) => (
                <img width="80px" src={v.thumbnail_common.url} />
              ))
            ) : (
              <h5>ESPERA</h5>
            )}
          </div>
        </div>
      </>
    );
  },

  // The "save" property must be specified and must be a valid function.
  save: function ({ attributes }) {
    return null;
  },
});

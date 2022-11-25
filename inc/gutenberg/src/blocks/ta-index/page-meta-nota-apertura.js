import React, { useEffect } from "react";
import RBPostsSelector from '../../components/rb-posts-selector/rb-posts-selector';
import {LRArticlesSelector} from '../../components/lr-articles-selector/lr-articles-selector';
import { useRBPosts } from '../../helpers/posts/posts';
import { useTAArticles } from '../../helpers/ta-article/useTAArticles';
const { registerPlugin } = wp.plugins;
const { PluginDocumentSettingPanel } = wp.editPost;
const { __ } = wp.i18n;
const { useEntityProp } = wp.coreData;
const { Spinner } = wp.components;

const TANotaAperturaPanel = () => {
    const postType = wp.data.select( 'core/editor' ).getCurrentPostType();
    if(postType !== 'page')
        return null;

    const [ meta, setMeta ] = useEntityProp(
        'postType',
        postType,
        'meta'
    );

    const metaValue = meta && meta['page_nota_apertura'] ? meta['page_nota_apertura'] : null;
    function updateMetaValue( posts ) {
        const postData = posts ? posts[0] : null;
        const postID = postData ? postData.ID : null;
        setArticlesData(postData ? [{ data: postData, loading: false, originalValue: postID }] : []);
        setMeta( { ...meta, 'page_nota_apertura': postID } );
    }

    const {
        articlesData,
        setArticlesData,
    } = useTAArticles( {
        posts: metaValue ? [metaValue] : [],
        postsQueryArgs: {
            post_type: 'ta_article',
        },
    } );

    const postFetched = articlesData && articlesData.length ? articlesData[0] : null;
    const postData = postFetched ? postFetched.data : null;
    const loading = postFetched ? postFetched.loading : false;

    return (
        <PluginDocumentSettingPanel
            name="ta-nota-apertura"
            title="Nota Apertura"
            className="custom-panel ta-nota-apertura"
        >
            <LRArticlesSelector
                articles = { postData ? [postData] : [] }
                postsArgs = {{
                    post_type: 'ta_article',
                }}
                max = {1}
                onSelectionChange = { (data) => updateMetaValue(data) }
                sortable = {false}
            />
            { loading && <Spinner/> }
        </PluginDocumentSettingPanel>
    );
};

registerPlugin( 'page-nota-apertura', {
    render: TANotaAperturaPanel,
    icon: 'media-document',
    priority: 10
} );
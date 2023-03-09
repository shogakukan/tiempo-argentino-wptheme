import React, { useEffect } from "react";
import RBPostsSelector from '../../components/rb-posts-selector/rb-posts-selector';
import {LRArticlesSelector} from '../../components/lr-articles-selector/lr-articles-selector';
import { useRBPosts } from '../../helpers/posts/posts';
import { useTAArticles } from '../../helpers/ta-article/useTAArticles';
const { registerPlugin } = wp.plugins;
const { PluginDocumentSettingPanel } = wp.editPost;
const { __ } = wp.i18n;
const { useEntityProp } = wp.coreData;
const { Spinner, ToggleControl } = wp.components;

const TANotaAperturaPanel = () => {
    const postType = wp.data.select( 'core/editor' ).getCurrentPostType();
    if(postType !== 'page')
        return null;

    const [ meta, setMeta ] = useEntityProp(
        'postType',
        postType,
        'meta'
    );

    const metaValue = meta && meta['page_nota_apertura'] ? meta['page_nota_apertura'] : {};
    const {
        post,
        white_logo,
        white_title
    } = metaValue;

    function updateMetaValue( { key, value } ) {
        if (key == 'post'){
            const postData = value ? value[0] : null;
            value = postData ? postData.ID : 0;
            setArticlesData(postData ? [{ data: postData, loading: false, originalValue: value }] : []);
        }
        setMeta( { ...meta, 'page_nota_apertura': {
            ...metaValue,
            [key]: value,
        } } );
    }

    const {
        articlesData,
        setArticlesData,
    } = useTAArticles( {
        posts: post ? [post] : [],
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
                onSelectionChange = { (value) => updateMetaValue({ key: 'post', value }) }
                sortable = {false}
            />
            { loading && <Spinner/> }
            {postData && 
                <>
                    <br />
                    <ToggleControl
                        label={"¿Logo en blanco?"}
                        checked={ white_logo }
                        onChange={ ( value ) => updateMetaValue( { key: 'white_logo', value } ) }
                    />
                    <ToggleControl
                        label={"¿Título en blanco?"}
                        checked={ white_title }
                        onChange={ ( value ) => updateMetaValue( { key: 'white_title', value } ) }
                    />
                </>
            }
            
        </PluginDocumentSettingPanel>
    );
};

registerPlugin( 'page-nota-apertura', {
    render: TANotaAperturaPanel,
    icon: 'media-document',
    priority: 10
} );
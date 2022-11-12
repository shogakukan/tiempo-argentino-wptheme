import React, { useState, useEffect, useRef } from "react";
import TAArticlePreview from '../TAArticlePreview/TAArticlePreview';
import useArticleRowData from '../../helpers/useArticleRowData/useArticleRowData';
const { Spinner, RangeControl, ToggleControl } = wp.components;
import './css/editor.css';

export function getCellsAmount(rowConfig){

    if(rowConfig.cells_amount == -1)
        return rowConfig.articles ? rowConfig.articles.length : 4;
    return rowConfig.cells_amount ? rowConfig.cells_amount : 4;
}

//const Controls = null;
const Controls = ( { row, index, onUpdate } ) => {
    const updateRow = (attribute, value) => {
        if(!onUpdate)
            return;

        const rowConfig = {...row};
        rowConfig[attribute] = value;

        onUpdate({
            row: rowConfig,
            index,
        });
    };

    return (
        <>
            <ToggleControl
                label = "Mostrar copete"
                checked = { row.show_excerpt }
                onChange={ (value) => updateRow('show_excerpt', value) }
            />
        </>
    );
}

const TAArticlesMiscelaneaRow = (props = {}) => {
    const {
        articles,
        cells,
        offset,
        isSelected,
        cells_amount,
        show_excerpt = false,
    } = props;
    const cellsAmount = getCellsAmount(props);

    const {
        hasArticles,
        getCellData,
        className,
    } = useArticleRowData(props);

    const firstCellData = getCellData(0);
    const secondCellData = getCellData(1);
    const thirdCellData = getCellData(2);
    const forthCellData = getCellData(3);

    const getArticlesList = () => {
        const cells = [];
        for( let i = 1; i < cellsAmount; i++){
            const cellData = getCellData(i);

            cells.push(
                <div className={ `cell common ${cellData.className}`}>
                    { cellData.article &&
                        <TAArticlePreview
                            article = { cellData.article }
                            size = "common"
                            orientation = "horizontal"
                        />
                    }
                </div>
            );
        }
        return cells;
    };

    return (
        <div className={`articles-list miscelanea ${className}`}>
            <div className="column">
                <div className={ `cell large ${firstCellData.className}`}>
                    { firstCellData.article &&
                        <TAArticlePreview
                            article = { firstCellData.article }
                            size = "large"
                            orientation = "vertical"
                        />
                    }
                </div>
            </div>

            <div className="column">

                { getArticlesList() }

            </div>
        </div>
    );

};

const data = {
    component: TAArticlesMiscelaneaRow,
    getCellsAmount,
    Controls,
    defaultConfig: {
        cells_amount: 4,
        show_excerpt: false,
    },
};

export default data;

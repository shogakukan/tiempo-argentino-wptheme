const { Fragment } = wp.element;
const { TextControl } = wp.components;
import TASeparator from '../TASeparator/TASeparator';
import RBContentEditable from '../../components/rb-contenteditable/rb-contenteditable';
import './css/editor.css';

const TAContainer = (props = {}) => {
    const {
        attributes = {},
        setAttributes,
        children = '',
        titleEditable = true,
    } = props;

    const {
        color_context = 'common',
        header_type = 'common',
        title = '',
        title_image = '',
    } = attributes;

    const headerClass = header_type == 'special' ? 'special' : '';
    const className = `ta-container ta-context ${color_context}`;
    const content = title_image ? '<img class="img-fluid" alt="'+title+'" src="'+title_image+'" width="" height="35" style="height: 35px !important;">' : title;

    return (
        <div className={className}>
            <div className = { `container-header wp-block ${headerClass}` } >
                <TASeparator/>
                <RBContentEditable
                    content = {content}
                    onBlur = { [(title) => setAttributes({title}), (title_image) => setAttributes({title_image})] }
                    className = "text"
                    disabled = { !titleEditable }
                />
            </div>
            <div className="container-content wp-block">
                {children}
            </div>
            <div className="container-footer wp-block">
                <TASeparator
                    alignment = "right"
                />
            </div>
        </div>
    );
};

export default TAContainer;

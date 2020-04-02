import React from 'react';
import {
    List,
    Datagrid,
    EmailField,
    ReferenceField,
    RichTextField,
    TopToolbar,
    CreateButton,
    ExportButton,
    Button,
    sanitizeListRestProps,
    Create,
    Edit,
    SimpleForm,
    TextInput,
    DateInput,
    ReferenceManyField,
    TextField,
    DateField,
    EditButton,
    ImageInput,
    ImageField,
    BooleanInput

} from 'react-admin';
import IconEvent from '@material-ui/icons/Event';
import RichTextInput from 'ra-input-rich-text';

import { Editor } from 'react-draft-wysiwyg';
import 'react-draft-wysiwyg/dist/react-draft-wysiwyg.css';

const MyEditor = (props) => (
    <Editor
        toolbarClassName="toolbarClassName"
        wrapperClassName="wrapperClassName"
        editorClassName="editorClassName"
    />
)

const ListActions = ({
    currentSort,
    className,
    resource,
    filters,
    displayedFilters,
    exporter, // you can hide ExportButton if exporter = (null || false)
    filterValues,
    permanentFilter,
    hasCreate, // you can hide CreateButton if hasCreate = false
    basePath,
    selectedIds,
    onUnselectItems,
    showFilter,
    maxResults,
    total,
    ...rest
}) => (
        <TopToolbar className={className} {...sanitizeListRestProps(rest)}>
            {filters && cloneElement(filters, {
                resource,
                showFilter,
                displayedFilters,
                filterValues,
                context: 'button',
            })}
            <CreateButton basePath={basePath} />
            {/* Add your custom actions */}
            <Button
                onClick={() => { alert('Your custom action'); }}
                label="Show calendar"
            >
                <IconEvent />
            </Button>
        </TopToolbar>
    );

ListActions.defaultProps = {
    selectedIds: [],
    onUnselectItems: () => null,
};

export const CakefillingList = props => (
    <List {...props}  actions={<ListActions />} >
        <Datagrid rowClick="edit">

            <TextField source="id" />
            <TextField source="name" />
            <TextField source="describe" />
            <EditButton basePath="/cakefilling" />
        </Datagrid>
    </List>
);

export const CakefillingShow = (props) => (
    <Show {...props}>
        <SimpleShowLayout>
            <TextField source="name" />
            <TextField source="slug" />
            <RichTextField source="describe" />
            <DateField label="Publication date" source="created_at" />
        </SimpleShowLayout>
    </Show>
);

export const CakefillingCreate = (props) => (
    <Create {...props}>
        <SimpleForm>
            <TextInput source="name" label="Name" />
            <TextInput source="slug" label="slug" />
            <TextInput source="price" label="Price per 1kg" />
            {/*<MyEditor props={"describe"} />*/}
            <RichTextInput source="describe" />
            <ImageInput source="pictures" label="Related pictures" accept="image/*">
                <ImageField source="image" title="title" />
            </ImageInput>
            <BooleanInput label="Visible" source="visible" />
            <DateInput label="Publication date" source="published_at" defaultValue={new Date()} />
        </SimpleForm>
    </Create>
);

export const CakefillingEdit = (props) => (
    <Edit {...props}>
        <SimpleForm>
            <TextInput disabled label="Id" source="id" />
            <TextInput source="name" />
            <RichTextInput source="describe" />
            <DateInput label="Publication date" source="published_at" />

        </SimpleForm>
    </Edit>
);
// <ReferenceManyField label="Comments" reference="comments" target="post_id">
//                 <Datagrid>
//                     <TextField source="body" />
//                     <DateField source="created_at" />
//                     <EditButton />
//                 </Datagrid>
//             </ReferenceManyField>

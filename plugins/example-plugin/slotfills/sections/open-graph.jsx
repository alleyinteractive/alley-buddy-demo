import { TextControl } from '@wordpress/components';
import { PluginDocumentSettingPanel } from '@wordpress/edit-post';
import { __ } from '@wordpress/i18n';
import React from 'react';

// Services.
import usePostMetaValue from '@/hooks/use-post-meta-value';

// Styles.
import './style.scss';

const OpenGraph = () => {
  const [title, setTitle] = usePostMetaValue('example_plugin_open_graph_title');

  return (
    <PluginDocumentSettingPanel
      icon="share"
      name="opengraph"
      title={__('Open Graph', 'example-plugin')}
    >
      <TextControl
        className="example-control"
        label={__('Title', 'example-plugin')}
        onChange={(next) => setTitle(next)}
        value={title}
      />
    </PluginDocumentSettingPanel>
  );
};

export default OpenGraph;

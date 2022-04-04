import { registerPlugin } from '@wordpress/plugins';

// Sections.
import OpenGraph from './sections/open-graph';

registerPlugin('example-plugin-open-graph', { render: OpenGraph });

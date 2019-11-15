const template = document.createElement('template');

template.innerHTML = `
    <style>
      :host {
        display: block;
        contain: content;
        text-align: center;
        background: papayawhip;
        margin: 0 auto;
      }
    </style>
    <slot name="block1"></slot>
    <slot name="block2"></slot>
    <slot name="block3"></slot>
    <slot name="block4"></slot>
  `;

class AdvanceSearchDialog extends HTMLElement {
  constructor() {
    super();
    this.attachShadow({ mode: 'open' });
    this.shadowRoot.appendChild(template.content.cloneNode(true));
  }
}

export default AdvanceSearchDialog;

import AdvanceSearchDialog from "./AdvanceSearchDialog";
import SearchDropdown from "./SearchDropdown";


class AdvanceSearch {
    constructor(selected = null) {
        this._selected = (selected != null) ? selected : null;

        // Add custom element 'advance-search'
        window.customElements.define('advance-search', AdvanceSearchDialog);

        // Make an ajax call
        this._fields = [
            {
                block: "block1",
                display: "Waterfront",
                name: "waterfront",
                options: [
                    {
                        name: 'waterfront',
                        choices: [
                            { title: "Gulf", value: "1" },
                            { title: "Intracoastal", value: "2" }
                        ],
                        placeholder: ''
                    }
                ]
            },
            {
                block: "block2",
                display: "Bedrooms",
                name: "bedrooms",
                options: [
                    {
                        choices: [
                            { title: "1", value: "1" },
                            { title: "2", value: "2" }
                        ],
                        name: 'min',
                        placeholder: ''

                    },
                    {
                        choices: [
                            { title: "1", value: "1" },
                            { title: "2", value: "2" }
                        ],
                        name: 'max',
                        placeholder: '',
                    }
                ]
            },
            {
                block: "block3",
                display: "Waterfront",
                name: "waterfront",
                options: [
                    {
                        choices: [
                            { title: "Gulf", value: "gulf" },
                            { title: "Intracoastal", value: "intracoastal" }
                        ],
                        name: 'waterfront',
                        placeholder: ''
                    }
                ]

            },
        ];

    }

    render() {

        if (this._selected == null) {
            return `        
            ${this._fields.map((data, index) => {
                let dropdown = new SearchDropdown(data);
                return `${dropdown.render()}`;
            })}`;
        }

        return `        
        ${this._fields.map((data, index) => {
            let dropdown = new SearchDropdown(data, this._selected[data.name]);
            return `${dropdown.render()}`;
        })}`;
    }
}

export default AdvanceSearch;
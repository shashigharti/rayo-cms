class SearchDropdown {
    constructor(data, selected = null) {
        this._data = data;
        this._selected = (selected != null) ? selected : null;
    }

    isSelected(value) {
        return (this._selected.find(elem => elem == value) == undefined) ? '' : 'selected';
    }

    render() {
        return `
        <span slot="${this._data.block}">        
        <div>${this._data.display}</div>
        ${this._data.options.map(option => {

            return `
            ${(option.title) ? `<div>${option.title}</div>` : ''}
            <select>

            <option value=''>
            ${(option.placeholder != '') ? option.placeholder : `Select ${option.name}`}
            </option>

            ${option.choices.map(choice => {
                if (this._selected != null) {
                    const selected = this.isSelected(choice.value);
                    return `<option value='${choice.value}' ${selected}>${choice.title}</option>`
                }

                return `<option value='${choice.value}'>${choice.title}</option>`
            })}

            </select>
            `}
        )}
        </span>`
    }
}

export default SearchDropdown;
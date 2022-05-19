import {render, fireEvent, getByText} from '@testing-library/vue'
import Component from '../components/example/Mycomponent.vue'

test('get text', async () => {
    const {getByText, findByText, queryByText} = render(Component)

    getByText('input person id:', {exact: false})

    await fireEvent.click(getByText('click'))
    getByText((content, element) => {
        return element.tagName.toLowerCase() === 'ul' && content.startsWith('KEY')
    })
})
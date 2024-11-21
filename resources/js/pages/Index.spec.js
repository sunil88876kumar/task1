import { render } from '@testing-library/vue'
import { flushPromises } from '@vue/test-utils'

import Index from './Index.vue'

const get = vi.fn();

window.axios = { get }

const mockResponse = {
    data: {
        data: [
            { id: 1, title: 'title1', rating: 5 },
            { id: 2, title: 'title2', rating: 5 },
        ],
        total: 2
    },
}

beforeEach(() => {
    vi.clearAllMocks();
});

test('Courses endpoint is called on render', () => {
    render(Index)

    expect(get).toHaveBeenCalledTimes(1)
    expect(get).toHaveBeenCalledWith('/api/courses')
})


test('Course cards are displayed on successful api response', async () => {
    get.mockReturnValue(mockResponse)

    const { getAllByText } = render(Index)

    await flushPromises();

    expect(getAllByText('title1')).toBeTruthy()
    expect(getAllByText('title2')).toBeTruthy()
})

test('Header displays correct value on successful api response', async () => {
    get.mockReturnValue(mockResponse)

    const { getByText } = render(Index)

    await flushPromises();

    expect(getByText('2 Courses')).toBeInTheDocument()
})

test('Header displays default value on api error', async () => {
    get.mockRejectedValue(new Error())

    const { getByText } = render(Index)

    await flushPromises();

    expect(getByText('0 Courses')).toBeInTheDocument()
})

test('Loading state shown when fetching api response', async () => {
    get.mockReturnValue(mockResponse)

    const { findByText, getByText, queryByText } = render(Index)

    expect(await findByText('Loading...')).toBeInTheDocument()
    expect(await findByText('0 Courses')).toBeInTheDocument()

    await flushPromises();

    expect(queryByText('Loading...')).not.toBeInTheDocument()
    expect(getByText('2 Courses')).toBeInTheDocument()
})


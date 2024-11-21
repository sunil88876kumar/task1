import { render } from '@testing-library/vue'
import CourseCard from './CourseCard.vue';

describe('CourseCard is rendered', () => {
    test('Card shows correct information about course', () => {
        const { getAllByText, getByText} = render(CourseCard, {
            propsData: {
                course: {
                    id: 1,
                    title: 'Safeguarding for Teachers and Teaching Assistants',
                    price: 3500,
                }
            },
        });

        expect(getAllByText('Safeguarding for Teachers and Teaching Assistants').length).toBe(2)
        expect(getByText('£35')).toBeInTheDocument()
    });

    test('Card shows correct rating stars', () => {
        const { getAllByTestId, getByText} = render(CourseCard, {
            propsData: {
                course: {
                    id: 1,
                    rating: 3
                }
            },
        });

        expect(getAllByTestId('yellow-star').length).toBe(3)
        expect(getAllByTestId('grey-star').length).toBe(2)
    });
});

import { render } from '@testing-library/vue'
import Nav from './Nav.vue';

test('Header has correct links', () => {
    const {getByText} = render(Nav)

    expect(getByText('Library')).toBeTruthy;
    expect(getByText('Membership')).toBeTruthy;
    expect(getByText('News')).toBeTruthy;
    expect(getByText('About')).toBeTruthy;
    expect(getByText('Login')).toBeTruthy;
})

import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';

export default function Home({ auth }) {
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>}
        >

        </AuthenticatedLayout>
    );
}

import type {NextPage} from "next"
import axios from "../../libs/axios"
import {AxiosError, AxiosResponse} from "axios"
import {useEffect, useState} from "react"
import {NextRouter} from "next/dist/shared/lib/router/router"
import {useRouter} from "next/router"
import {useAuth} from "../hooks/useAuth";
import Link from "next/link";
import {Loading} from "../../components/Loading";

type Customer = {
    title: string;
    body: string;
}

const Customer: NextPage = () => {
    const router: NextRouter = useRouter()
    const [customers, setCustomers] = useState<Customer[]>([])
    const {checkLoggedIn} = useAuth()
    const [isLoading, setIsLoading] = useState(true)

    useEffect(() => {
        const init = async () => {
            const response: boolean = await checkLoggedIn()
            if (!response) {
                await router.push('/login')
            }
            axios
                .get('/api/customers')
                .then((response: AxiosResponse) => {
                    console.log(response.data);
                    setCustomers(response.data.data);
                })
                .catch((err: AxiosError) => console.log(err.response))
                .finally(() => setIsLoading(false));
        }
        init()
    }, [])

    if (isLoading) return <Loading />

    return (
        <div>
            <Link href='/customers/post'>
                <a>顧客を追加する</a>
            </Link>
            <p>顧客一覧</p>
        </div>
    )
}

export default Customer

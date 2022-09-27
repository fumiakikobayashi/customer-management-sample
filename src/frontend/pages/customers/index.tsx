import type { NextPage } from "next"
import {useUserState} from "../../atoms/userAtom"
import axios from "../../libs/axios"
import {useEffect, useState} from "react"
import {NextRouter} from "next/dist/shared/lib/router/router"
import {useRouter} from "next/router"
import {useAuth} from "../hooks/useAuth";

type Customer = {
    title: string;
    body: string;
}

const Customer: NextPage = () => {
    const router: NextRouter = useRouter()
    const [customers, setCustomers] = useState<Customer[]>([])
    const { checkLoggedIn } = useAuth()

    useEffect(() => {
        const init = async () => {
            const response: boolean = await checkLoggedIn()
            if (!response) {
                await router.push('/login')
            }
        }
        init()
    }, [])

    return (
        <div>
            顧客一覧
        </div>
    )
}

export default Customer

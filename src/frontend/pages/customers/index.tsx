import type { NextPage } from "next"
import {useUserState} from "../../atoms/userAtom"
import axios from "../../libs/axios"
import {useEffect, useState} from "react"
import {NextRouter} from "next/dist/shared/lib/router/router"
import {useRouter} from "next/router"

type Customer = {
    title: string;
    body: string;
}

const Customer: NextPage = () => {
    const router: NextRouter = useRouter()
    const [customers, setCustomers] = useState<Customer[]>([])
    const { user } = useUserState()

    useEffect(() => {
        if (!user) {
            router.push('/login')
            return
        }
        axios
            .get('/api/customers')
            .then((response) => {
                setCustomers(response.data.data)
            })
            .catch((err) => console.log(err.response))
    }, [user, router])

    return (
        <div>
            顧客一覧
        </div>
    )
}

export default Customer

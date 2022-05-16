export default interface IUserPermission {
    user_id: number,
    permission: string,
    created_at: string,
    updated_at: string,
    deleted_at: string | null
}